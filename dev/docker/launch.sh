#!/bin/bash

SCRIPTDIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )

cd "$SCRIPTDIR";

if [ ! -f "local.yml" ]; then
	cp local-sample.yml local.yml
fi


docker-compose --project-name=wordpress --file=local.yml up
