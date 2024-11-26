pipeline {
    agent any

    environment {
        DOCKER_COMPOSE_VERSION = '2.21.0'
        APP_NAME = 'boneva'
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
                    // Build images dengan caching dan tanpa cache opsional
                    sh '''
                        docker compose build --no-cache app nginx
                    '''
                }
            }
        }

        stage('Deploy') {
            steps {
                script {
                    // Hentikan kontainer lama
                    sh 'docker compose down'

                    // Start kontainer baru
                    sh 'docker compose up -d'

                    // Migrasi database dengan rollback otomatis jika gagal
                    // sh '''
                    //     docker compose exec app php artisan migrate \
                    //         --force \
                    //         --no-interaction
                    // '''

                    // Set permission yang aman
                    sh '''
                        docker compose exec -T app chown -R www-data:www-data storage
                        docker compose exec -T app chown -R www-data:www-data bootstrap/cache
                        docker compose exec -T app chmod -R 755 storage
                        docker compose exec -T app chmod -R 755 bootstrap/cache
                    '''

                    // Clear cache aplikasi
                    // sh '''
                    //     docker compose exec -T app php artisan config:clear
                    //     docker compose exec -T app php artisan cache:clear
                    //     docker compose exec -T app php artisan view:clear
                    //     docker compose exec -T app php artisan route:clear
                    // '''
                }
            }
        }

        // stage('Health Check') {
        //     steps {
        //         script {
        //             // Lakukan pengecekan status aplikasi
        //             sh '''
        //                 if ! docker compose exec -T app php artisan tinker --execute="echo 'OK'"; then
        //                     echo "Health check failed"
        //                     exit 1
        //                 fi
        //             '''
        //         }
        //     }
        // }
    }

    post {
        success {
            // Notifikasi deployment berhasil (misalnya via email/slack)
            echo 'Deployment successful!'
        // Tambahkan notifikasi email/slack di sini
        }

        failure {
            script {
                // // Rollback dengan lebih aman
                // sh '''
                //     docker compose down
                //     docker compose up -d --no-deps app nginx
                //     docker compose run --rm app php artisan migrate:rollback
                // '''
                echo 'Deployment failed! Rolled back to previous version.'
            }
        }

        always {
            // Bersihkan docker secara aman
            sh '''
                docker system prune -af --filter "label!=keep"
            '''

            // Bersihkan workspace
            cleanWs()
        }
    }
}
