# Larapulse
Larapulse is a custom implementation of the popular PHP framework, Laravel. It's designed to meet your specific needs, with tailored features and optimizations to enhance development efficiency, flexibility, and performance.

## Getting Started
Follow these steps to get started: 
```bash
git clone git@github.com:kangketik/larapulse.git
composer install && npm install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
bash .docker/server/bin/generate-echo-config.sh
```
## Notes
Due to the ext-pcntl not available in windows development, use this command to install composer requirements.
```bash
composer install --ignore-platform-reqs
```

### For Auto Deployment
Follow these steps to get started with Larapulse:
- Fork or copy this repository to your account. You will see a failed github actions because the secret environment is not set yet.
- Login to your server, navigate to your desired directory, and create a new folder named **larapulse**.
- Go to the Repository Setting > Actions > General. Search **Workflow Permission** and set to Read and write permission.
- On the same page, go to Secrets and Variables > Actions. Then, create a new repository secret with the following:

| Name                      | Value                               |
| ------------------------- | ----------------------------------- |
| HOST_SERVER               | Your server IP                      |
| HOST_USERNAME             | Your server username                |
| HOST_PASSWORD             | Your server password                |
| HOST_SSH_PORT             | Your server SSH port                |
| HOST_DIRECTORY            | Your app directory                  |
| DB_USERNAME               | Your database username              |
| DB_PASSWORD               | Your database password              |
| DOCKER_APP_PORT           | Your preferred remote app port      |
| DOCKER_DBMS_PORT          | Your preferred remote DBMS port     |
| DOCKER_DATABASE_PORT      | Your preferred remote database port |
| WEB_URL                   | Your app URL                        |
| TURNSTILE_SITE_KEY        | Your Turnstile site key             |
| TURNSTILE_SECRET_KEY      | Your Turnstile secret key           |
| LB_KEY                    | Your Laravel Log Reader key         |
| LB_PROJECT_KEY            | Your Laravel Log Reader project key |

- Create new first tag `v0.1`
- Make sure there is no running actions on action page then, re run the first failed action.
If you face some problem, feel free to open an issue.

## Useful Links
- [Laravel](https://laravel.com/)
- [Cloudflare Turnstile](https://developers.cloudflare.com/turnstile/)
- [Larabug](https://larabug.com/)
