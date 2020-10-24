# Kanvas Api
Kanvas Ecosystem API powered by PhalconPHP

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bakaphp/phalcon-api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bakaphp/phalcon-api/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/bakaphp/phalcon-api/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/bakaphp/phalcon-api/?branch=master)
[![Build Status](https://travis-ci.com/bakaphp/phalcon-api.svg?branch=master)](https://travis-ci.com/bakaphp/phalcon-api)
[![Tests](https://github.com/bakaphp/phalcon-api/workflows/Tests/badge.svg?branch=0.2)](https://github.com/bakaphp/phalcon-api/actions?query=workflow%3ATests)


### Installation
- Clone the project
- Copy `storage/ci/.env.prod` and paste it in the root of the project and rename it `.env`
- On `phalcon-api/.env` in `MYSQL_ROOT_PASSWORD` and `DATA_API_MYSQL_PASS` assign the root password for MySQL.
- On `phalcon-api/.env`, update MySQL credentials (`DATA_API_MYSQL_NAME,DATA_API_MYSQL_USER,DATA_API_MYSQL_PASS`)
- On `phalcon-api/.env`, change `DATA_API_MYSQL_HOST =  localhost` to `DATA_API_MYSQL_HOST =  mysql`
- Run Docker containers with the `docker-compose up --build` command
- After the build, access the project main container with `docker exec -it id_of_docker_container sh`
- Inside the container's console run get inside the `apps` folder, `cd app/`
- Copy `storage/ci/phinx.php` to `phinx.php`
- Copy `storage/ci/phinx-kanvas.php` to `phinx-kanvas.php`
- To finish the setup run `./runCli setup start` this will run migration, seed and acl

**NOTE** : This requires [docker](https://www.docker.com/) to be present in your system. Visit their site for installation instructions.

### CREATE NEW APP

- To create a new app run `./runCli setup newapp {{AppName}}`

### CLI
- Clear model and temp cache `./app/php cli/cli.php clearcache` 
- Update db migartion  `./app/vendor/bin/phinx migrate -e production`
- Clear old Sessions on db  `./app/php cli/cli.php clearcache sessions`

### QUEUES
The Kanvas Core uses RabbitMQ to manage our queue process. Internally we handle 3 queue jobs to start
- `php cli/cli.php queue jobs`
- `php cli/cli.php queue events`
- `php cli/cli.php queue notifications`

**Jobs** : will handle normal Jobs run on any moment during the runtime of the app

**Events** : will handle events we run send to the queue 
  `$this->events->fireToQueue('user:test', Users::findFirst(), ['test'])`

**Notifications** : will handle notifications we send to the queue 
  `Users::findFirst(18)->notify(new CanvasSubscription(Companies::findFirst(10)))`


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

### TEST

- Inside the container's console run `./vendor/bin/codecept run` 

### TODO
- Documentation
