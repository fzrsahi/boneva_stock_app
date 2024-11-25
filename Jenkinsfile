pipeline {
    agent any

    environment {
        DOCKER_COMPOSE_VERSION = '2.21.0'
        APP_NAME = 'boneva-app'
        IMAGE_TAG = "${BUILD_NUMBER}"
    }

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Build') {
            steps {
                script {
                    // Build Docker images
                    sh 'docker-compose build'

                    // Install dependencies
                    sh '''
                        docker-compose run --rm app composer install --no-interaction --optimize-autoloader --no-dev
                    '''
                }
            }
        }

        stage('Deploy') {
            steps {
                script {
                    // Stop existing containers
                    sh 'docker-compose down'

                    // Start new containers
                    sh 'docker-compose up -d'

                    // Run migrations
                    sh 'docker-compose exec -T app php artisan migrate --force'

                    // Clear cache
                    sh '''
                        docker-compose exec -T app php artisan config:cache
                        docker-compose exec -T app php artisan route:cache
                        docker-compose exec -T app php artisan view:cache
                    '''

                    // Set proper permissions
                    sh '''
                        docker-compose exec -T app chmod -R 777 storage
                        docker-compose exec -T app chmod -R 777 bootstrap/cache
                    '''
                }
            }
        }

        stage('Health Check') {
            steps {
                script {
                    // Wait for application to be up
                    sh 'sleep 10'

                    // Check if application is responding
                    sh 'curl -f http://localhost:4004 || exit 1'
                }
            }
        }
    }

    post {
        success {
            echo 'Deployment successful!'
        }
        failure {
            script {
                // Rollback in case of failure
                sh 'docker-compose down'
                sh 'docker-compose up -d --no-deps app nginx'
            }
            echo 'Deployment failed!'
        }
        always {
            // Cleanup
            sh 'docker system prune -f'
        }
    }
}
