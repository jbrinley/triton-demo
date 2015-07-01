# WordPress on Triton

An example configuration for developing a WordPress site locally and deploying to Joyent's Triton platform.

# Local Development

`./dev/docker/launch.sh`

Launches the containers to run the project locally, with local files mounted into the containers.

If you haven't created a `local.yml` file already, the script will create one for you, copying `local-sample.yml`.

# Build

`./dev/docker/build.sh`

Creates two new images, `jbrinley/triton-demo-php:latest` and `jbrinley/triton-demo-nginx:latest`. These are identical to their base images (`jbrinley/php:5.6-fpm` and `nginx:1.9`) with all project and config files copied into the container.

`./dev/docker/push.sh`

Pushes the images to the Docker Hub Registry.

