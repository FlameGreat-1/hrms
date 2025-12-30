
# HRMS - Human Resource Management System

Laravel 11 HRMS application with employee, department, and skill management.

## Prerequisites

- Docker & Docker Compose

## Quick Start

# 1. Clone repository
git clone <repository-url>
cd hrms

# 2. Environment file

Verify the .env file to be sure it's correct and accurate

# 3. Install and start application
docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php83-composer:latest composer install --ignore-platform-reqs && ./vendor/bin/sail up -d && sleep 15 && ./vendor/bin/sail artisan key:generate && ./vendor/bin/sail artisan session:table && ./vendor/bin/sail artisan cache:table && ./vendor/bin/sail artisan migrate --seed && ./vendor/bin/sail npm install && ./vendor/bin/sail npm run build

# 4. Access application
# http://localhost

# Login Credentials

Email: admin@hrms.com
Password: admin123hrms

# Stop Application

./vendor/bin/sail down

# Restart Application

./vendor/bin/sail up -d


INSTRUCTIONS:


1. EVERYTHING MUST BE PRODUCTION READY, ENTERPRISE GRADE, BEST PRACTICES AND INDUSTRY STANDARD.


2. YOU MUST STAY ALIGNED WITH THE FEATURES, REQUIREMENST AND INSTRUCTIONS OF THE ASSESSMENT WITHOUT DEVIATION, GOING OFF POINT ETC


3. DO NOT OVER COMPLICATE THINGS BY GOING OUT OF SCOPE OF THE REQUIREMENTS


4. YOU MUST DEPLOY THE EXPERTISE OF A FULL-STACK ENGINEER, SENIOR ENGINEER AND DEVELOPER. SO YOU ARE NOT JUST A PETTY OR NEWBIE. THIS IS VERY IMPORTANT BECAUSE THIS ASSESSMENT IS CRITICAL.


5. YOU MUST EXECUTE EVERYTHING WITH 100% ACCURACY AND PRECISION.


6. EVERYTHING MUST BE WORKING PERFECTLY AND ACCURATELY WITHOUT ISSUES OR ERRORS


7. DO NOT OMIT OR MISS ANYTHING AT ALL.


8. AND DO NOT INCLUDE UNNECCESSARY COMMENTS

ALSO, VERY IMPORT: AVOID DUPLIACTIONS AND REDUDANCIES.
YOU HAVE TO ENSURE, CLEAN AND PERFECT CODES AS A SENIOR ENGINEER
