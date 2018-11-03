FROM ubuntu:12.04

# Usage: File Author/Maintainer
MAINTAINER vlead-systems "systems@vlabs.ac.in"

#Usage: Setting proxy environment
#ENV http_proxy "http://proxy.iiit.ac.in:8080"
#ENV https_proxy "http://proxy.iiit.ac.in:8080"

# Usage: Updating system
RUN apt-get update


# Pre-build


# Usage: Installing dependencies for advanced-analytical-chemistry-virtual-lab
RUN apt-get install -y make rsync apache2 wget php5

RUN mkdir /advanced-analytical-chemistry-virtual-lab

COPY src/ /advanced-analytical-chemistry-virtual-lab/src

WORKDIR ./advanced-analytical-chemistry-virtual-lab/src

#Usage: Running make
RUN make

RUN mv /var/www/index.html index.html.default
RUN cp -r ../build/* /var/www/


# Post-build


EXPOSE 80
EXPOSE 443

#Usage: Setting permissions in /var/www
RUN chmod -R 755 /var/www/*
CMD /usr/sbin/apache2ctl -D FOREGROUND