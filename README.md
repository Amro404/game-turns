# Game Turns

This is the repository for Code95 task. It includes the necessary code and instructions to set up and run the project.

## Getting Started

### Prerequisites

Make sure you have Docker installed on your machine.

### Installation
1. Clone the repository: 

    shell 
    ```git clone https://github.com/Amro404/game-turns```
   
2. Change into the project directory:
   
    shell 
    ```cd game-turns```
   
3. Build the Docker containers:
   
shell ```sh ./start.sh``` this command will do all the following

1. build up the containers
2. install composer
4. run the tests

##### Note: make sure the port ```90``` is free

##

#### The task has 1 main API

1. Get game turns ```/api/game-turns?players=3&turns=4&start=A```  ```GET```
##

#### the business core logic will be under the following directories:

in the ```src``` directory:

```\app\Http\Controllers``` <br>
```\app\Services```<br>

##
## Tests
To run all unit tests, use the following command:
shell
``` docker-compose run --rm php vendor/bin/phpunit ```


