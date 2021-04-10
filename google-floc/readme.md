# How To Block Visits To Your Website From Being Counted in Google FLoC

Google has announced they have [started testing FLoC](https://blog.google/products/ads-commerce/2021-01-privacy-sandbox/) so you can expect the number of users being counted in FLoC to increase. Currently there is no official way to opt-out of FLoC, but [according to the github documentation](https://github.com/WICG/floc) disabling third-party cookies is a workaround solution.

For website publishers there is a way to make sure visits to their website isn't included in FLoC by adding the following code to their website header:
>
>Permissions-Policy: interest-cohort=()
>
The easiest way to do this is by adding somee code to your HTACCESS file. Making a mistake when editing your HTACCESS will completely break your website, so if you don't know what you're doing or have never edited your HTACCESS file this might not be a good idea. If you do want to add the code, you'll ned to add the three lines below:
>
>&lt;IfModule mod_headers.c&gt;<br />
>Header always set Permissions-Policy "interest-cohort=()"<br />
>&lt;/IfModule&gt;<br />
>
Once you've saved your HTACCESS file use a [header checker](https://securityheaders.com/) and look for "interest-cohort=()" next to the "Permissions-Policy" section, if it's there you're good.

## What Websites Should Be Blocking Google FLoC
If you run a website that deals with Personally Identifiable Information (PII) you should probably be blocking FLoC. If your website has medical, health, fitness, financial, dating, relationship, genders, sexuality, political, or any type of contrevertial content, you probably should be blocking FLoC.

## What Websites Should Not Be Blocking FLoC
It's currently unknown if there are any negative consequences for blocking FLoC, so you should be careful where you do decide to implement this code. That said there are some websites where blockinmg FLoC seeems like a bad idea. If your website earns income using Google AdSense, I would not block FLoC. Additionally if your website gets traffic, sales, or leads from PPC Advertising from things like Google Adwords I would not block FLoC.

