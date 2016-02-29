FROM tutum/apache-php

RUN rm -fr /app
RUN ln -s . /app
RUN npm install

EXPOSE 80
