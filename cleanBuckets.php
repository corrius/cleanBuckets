<?php
    // Include the SDK using the Composer autoloader
    require 'vendor/autoload.php';

    use Aws\Common\Aws;

    // Instantiate the S3 client with your AWS credentials and desired AWS regionws\Common\Aws;

    //aws factory
    $aws = Aws::factory('/var/www/vendor/aws/aws-sdk-php/src/Aws/Common/Resources/custom-config.php');

    $client = $aws->get('S3'); 

    $result = $client->listBuckets();

    foreach ($result['Buckets'] as $bucket) {
        if ($bucket['Name'] != 'corrius'){
            $iterator = $client->getIterator('ListObjects', array(
                'Bucket' => $bucket['Name']
            ));

            foreach ($iterator as $object) {
                $deleteObject = $client->deleteObject(array(
                    // Bucket is required
                    'Bucket' => $bucket['Name'],
                    // Key is required
                    'Key' => $object['Key'],
                ));
            }
            // Each Bucket value will contain a Name and CreationDate
            $deleteBucket = $client->deleteBucket(array(
                // Bucket is required
                'Bucket' => $bucket['Name'],
            ));
        }
    }

?>