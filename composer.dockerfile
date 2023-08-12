FROM composer:2

ENV COMPOSERUSER=game-turns
ENV COMPOSERGROUP=game-turns

RUN adduser -g ${COMPOSERGROUP} -s /bin/sh -D ${COMPOSERUSER}