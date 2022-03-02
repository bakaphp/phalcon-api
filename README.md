# kanvas-api
Kanvas Ecosystem API powered by PhalconPHP

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bakaphp/phalcon-api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bakaphp/phalcon-api/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/bakaphp/phalcon-api/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/bakaphp/phalcon-api/?branch=master)
[![Build Status](https://travis-ci.com/bakaphp/phalcon-api.svg?branch=master)](https://travis-ci.com/bakaphp/phalcon-api)


### Installation
- Clone the project
- Copy `storage/ci/.env.prod` and paste it in the root of the project and rename it `.env`
- On `phalcon-api/.env` in `MYSQL_ROOT_PASSWORD` and `DATA_API_MYSQL_PASS` assign the root password for MySQL.
- On `phalcon-api/.env`, update MySQL credentials (`DATA_API_MYSQL_NAME,DATA_API_MYSQL_USER,DATA_API_MYSQL_PASS`)
- On `phalcon-api/.env`, change `DATA_API_MYSQL_HOST =  localhost` to `DATA_API_MYSQL_HOST =  mysql`
- Run Docker containers with the `docker-compose up --build` command
- After the build, access the project main container with `docker exec -it id_of_docker_container sh`
- Inside the container's console run get inside the `apps` folder, `cd app/`
- Inside the container's console run  `./vendor/bin/phinx migrate -e production` to create the db , you need to have the phinx.php file , if you dont see it on your main filder you can       find the copy at `storage/ci/phinx.php`
- Inside the container's console run `./vendor/bin/phinx seed:run` to create the necesary initial data
- Inside the container's console run `php cli/cli.php acl` AND `php cli/cli.php acl crm` to create the default roles of the system
- Inside the container's console run `./vendor/bin/codecept run` to run project tests.

**NOTE** : This requires [docker](https://www.docker.com/) to be present in your system. Visit their site for installation instructions.

**NOTE** : To ensure the project runs smoothly in a development environment you must comment or remove `canvas/core": "dev-master"` dependency from composer.json

### Kanvas Core Developer Mode
If you need to work with the kanvas core directly
- Download [Canvas Core](https://github.com/bakaphp/canvas-core) and copy it on the same folder where `phalcon-api` is located(Both projects must be in the same folder).
- On  `phalcon-api/library/Core/autoload.php` comment `require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . '/vendor/canvas/core/src/Core/functions.php';` and uncomment `require  '/         canvas-core/src/Core/functions.php';`
- On `phalcon-api/library/Core/autoload.php` uncomment `'Canvas' => '/canvas-core/src',`

### CLI
- On every deploy crear the session caches `./app/php cli/cli.php clearcache` 
- On every deploy update your DB `./app/vendor/bin/phinx migrate -e production`
- Queue to clear jwt sessions `./app/php cli/cli.php clearcache sessions`

### QUEUES
The Kanvas Core uses RabbitMQ to manage our queue process. Internally we handle 3 queue jobs to start
- `php cli/cli.php queue jobs`
- `php cli/cli.php queue events`
- `php cli/cli.php queue notifications`

**Jobs** : will handle normal Jobs run on any moment during the runtime of the app

**Events** : will handle events we run send to the queue `$this->events->fireToQueue('user:test', Users::findFirst(), ['test'])`

**Notifications** : will handle notifications we send to the queue `Users::findFirst(18)->notify(new CanvasSubscription(Companies::findFirst(10)))`

### Features
- User Managament
  - Registration , Login, Multi Tenant 
- ACL 
- Saas Configuracion
 - Company Configuration
 - Payment / Free trial flow
- Rapid API CRUD Creation


### Baka HTTP
We use the library [Baka HTTP](https://github.com/bakaphp/http) to handle our Routing 

### Usage

### ACL
By Default the Canvas will assign all register user the Admin role but if you want to define a specific roles , you will need to add to your app settings

`defaultAdminRole : App.RoleName`

#### Requests

## Ecosystem
When working with other local apps we have created a docker network called `canvas_network` , this will allow other local ecosystem apps to connect to it if needed

Add to your local docker-compose file on the app network

``` 
  my-proxy-net:
    external:
      name: canvas_network
``` 

And on your contianer network info

```
    networks:
      - local-network
      - my-proxy-net
```

### TODO
- Documentation