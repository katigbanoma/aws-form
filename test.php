<?php
// Include the SDK using the Composer autoloader
require 'vendor/autoload.php';

$s3 = new Aws\S3\S3Client([
    'version' => 'latest',
    'region'  => 'us-west-1'
]);
var_dump($s3);

$sdk = new Aws\Sdk([
    'region'   => 'us-west-1',
    'version'  => 'latest',
    'DynamoDb' => [
        'region' => 'eu-central-1'
    ]
]);

$client = $sdk->createDynamoDb();

// Use an Aws\Sdk class to create the S3Client object.
$s3Client = $sdk->createS3();

// Send a PutObject request and get the result object.
$result = $s3Client->putObject([
    'Bucket' => 'my-bucket',
    'Key'    => 'my-key',
    'Body'   => 'this is the body!'
]);

// Download the contents of the object.
$result = $s3Client->getObject([
    'Bucket' => 'my-bucket',
    'Key'    => 'my-key'
]);

// Print the body of the result by indexing into the result object.
echo $result['Body'];

?>
