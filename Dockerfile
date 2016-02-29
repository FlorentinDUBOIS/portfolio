FROM tutum/apache-php

RUN rm -fr /app
RUN npm install
RUN cp -r . /app

EXPOSE 80
