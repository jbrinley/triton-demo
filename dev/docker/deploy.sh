#!/bin/bash

SCRIPTDIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )
cd "$SCRIPTDIR"

$(cat ~/.sdc/docker/moderntribe/env.sh)

# use a local docker-compose to ensure version 1.2
./docker-compose --project-name=wordpress --file=production.yml up -d --no-recreate
