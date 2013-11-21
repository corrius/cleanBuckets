cleanBuckets.php
================

A simple php script that deletes every S3 bucket in your aws account but the one you specify at the beginning.

I coded it while developing an PHP app and creating too many buckets filled with objects and looking for a quick way of deleting every object so I can delete every undesired bucket.

As you may know AWS S3 doesn't allow you to delete a bucket if it contains any object.

##############
#How to run it.
##############

Run it with "php cleanBuckets", it doesn't need administrator privileges.

###########
#Requisites
###########

AWS SDK for PHP installed and configured with your AWS credentials and the region for more information visit: http://aws.amazon.com/sdkforphp/
