FROM florentindubois/archlinux-go:latest
MAINTAINER Florentin DUBOIS <contact@florentin-dubois.fr>

RUN pacman -Syyuu curl openssh git tar gzip yarn nodejs --noconfirm --needed
RUN go get github.com/mholt/caddy/caddy

ADD Caddyfile /etc/Caddyfile
COPY . /srv/http
WORKDIR /srv/http

VOLUME /root/.caddy

EXPOSE 80 443 2015

CMD ["/root/go/bin/caddy", "--conf", "/etc/Caddyfile"]
