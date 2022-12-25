FROM sameernyaupane/oda:1.3

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer/cache && \
    chown -R $user:$user /home/$user

USER $user