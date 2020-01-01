# Containerized Nextcloud Suite

A Fully Containerized Nextcloud System with Collabora, S3 Object Storage Possible Backend, Nginx, Redis Caching and FMP-PHP.

## Features:

- Mariadb Database Backend

- PHP-FPM Frontend

- Nginx Reverse Proxy w/Let's Encrypt companion

- Redis Caching Server

- Collabora Online Office Integration
  
  

## Getting This Up and Running:

1. Set up a Linux Server with `docker` and `docker-compose`.

2. Register a domain or find one you already have: `example.com`. Then create two subdomain entries with whatever name server system you are using (Cloudflare, DigitalOcean, etc...) If you're using DigitalOcean [here is a helpful guide.](https://www.digitalocean.com/community/tutorials/how-to-point-to-digitalocean-nameservers-from-common-domain-registrars)
   
   - one for your main nextcloud instance: `mynextcloud.example.com`
   
   - one for your collabora instance: `collabora.example.com`

3. Clone this repository to your Linux instance or copy `/web`, `/proxy`, `docker-compose.yml`, and `db.env` to your machine.

4. Replace the `[##mynextcloud.example.com##]` & `[##collabora.example.com##]` with your values in `docker-compose.yml`. These should be formatted like `collabora.example.com` without the brackets.

5. Replace the `/home/[##USER##]/nextcloud` volume values with the name of your user in `docker-compose.yml`

6. Replace the `[##REPLACE ME WITH A RANDOMLY GENERATED PASSWORD##]` values in `docker-compose.yml` and `db.env`

7. Run the command `docker-compose up -d --remove-orphans --build` to build your nextcloud machine for the first time.

8. Wait for a minute and then navagate to your `mynextcloud.example.com` to check that every is up and running. **If you are planning on using object storage do NOT create the admin account yet!**

9. If you're planning on just using the local storage of the machine that's it, you can move on to the collabora section. Congrats!
   
   #### **Object Storage Instructions:**

10. For those of us who like inifitely scaling storage, let's set up our S3 backend for nextcloud. Update the `[##VALUES##]` in `storage.config.php` with the specifics for your bucket.

11. Now we're going to need to slip that information into the main nextcloud config before it gets fully installed. Copy `storage.config.php` to `/home/[##YOU##]/nextcloud/config/` . You can do this by running:
    
    `sudo cp storage.config.php /home/[##YOU##]/nextcloud/config/`

12. Now restart the whole nextcloud cluster with the command: `docker-compose restart`

13. You should now be able to navagate to `mynextcloud.example.com` and create your admin user which will fully install nextcloud and setup your storage on the object storage bucket.
    
    #### **Collabora Instructions:**

14. At this point your collabora server should be running at `collabora.example.com` and if you navagate to it you should see a blank page with`OK` displayed.

15. Now download the collabora integration app through the apps section in your nextcloud portal. Then navagate to the collabora settings in your main nextcloud settings tab. This is where is gets weird. Enter your collabora server as `http://[##collabora.example.com##]:80` . The reverse proxy will blanket everything in https so don't worry about using http its just a weird thing you have to do to get the containers to talk to each other. After this you should get an error about the instance and the collabora server not using the same protocol but that's okay because of the reverse proxy.

16. **Ta da! You should at this point be done! Enjoy the setup!**
