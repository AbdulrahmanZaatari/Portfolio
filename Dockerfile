FROM php:8.2-apache
# Update and install dependencies
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*

# Set the working directory to Apache's document root
WORKDIR /var/www/html

# Copy all website files into the container
COPY . /var/www/html/

# Configure Apache to use the document root
RUN chown -R www-data:www-data /var/www/html/ && \
    chmod -R 755 /var/www/html/

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]