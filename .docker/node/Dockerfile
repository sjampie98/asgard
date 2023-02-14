FROM node:18.12.1-alpine

RUN apk update && apk add make g++

RUN yarn install \
  --prefer-offline \
  --frozen-lockfile \
  --non-interactive

WORKDIR /var/www
