# fuzzy-tutors' Docker deployment

This docker-compose repository can be used to deploy
[fuzzy-tutors](https://github.com/Exequtech/fuzzy-tutors).

## Installation

First, clone the repository to the host machine you plan to run it on. Then,
follow these steps from inside the cloned directory.

### 1. Environment variables

Environment variables (from a `.env` file) are necessary to configure the
behavior of your fuzzy-tutors Docker deployment.

For a simple set-up, copy/rename `.env-template` to `.env` and follow the
comments in the file to decide what to set the variables as.

### 2. Proxy stuff

The web server needs to listen on an HTTP and an HTTPS port for proper
functionality. By default this is with 80, and 443, but it is recommended that
those ports be managed by a reverse proxy like NGINX instead.

For simplified functionality, the server uses simple self-signed certs (which
are not trusted by any secure piece of software). It's recommended that secure
HTTPS connections are handled externally, and both HTTP and HTTPS ports are
proxied to the web server from different ports.

See the `.env-template` file for port variables to customize which are exposed
to the server.

### 3. Compose

Then you're done! We sustained the rest of the headaches for you. Just compose
it using docker, here's the simplest command for Linux systems:

```
sudo docker compose up
```

And then to stop it, hit Ctrl+C, or, if you detached the process just run:

```
sudo docker compose down
```

### Notes:

1. **Database Storage**: The compose project mounts a volume in the local
   directory upon execution called `db_data`, which contains the MySQL
   database's current state.
2. **Run process**: When you run the services with docker compose up, various
   install scripts run to ensure that the database is fully ready for the
   website's functionality. These include creating the entire `db_data` state,
   creating the database, creating all the tables and creating a bootstrap
   user.
3. **Clearing database**: It is completely safe to stop the server, delete the
   `db_data` folder, and restart it. This will completely remove all data from
   the application.
