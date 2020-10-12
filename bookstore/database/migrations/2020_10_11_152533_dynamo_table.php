<?php

use Illuminate\Database\Migrations\Migration;
use BaoPham\DynamoDb\Facades\DynamoDb;

class DynamoTable extends Migration
{
    private $client;
    private $config = [];
    private $tableName;

    public function __construct()
    {        
        $this->tableName = with(new App\Models\Book)->getTable();

        if(env('DYNAMODB_LOCAL')) {
            $this->config['endpoint'] = env('DYNAMODB_LOCAL_ENDPOINT');
        }
        
        $this->client = DynamoDb::client();        
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $schema = [
            "AttributeDefinitions" => [
                [
                    "AttributeName" => "id", 
                    "AttributeType" => "S"
                ]
            ], 
            "TableName" => $this->tableName, 
            "KeySchema" => [
                [
                    "AttributeName" => "id", 
                    "KeyType" => "HASH"
                ]
            ],
            "ProvisionedThroughput" => [
                "ReadCapacityUnits" => 1, 
                "WriteCapacityUnits" => 1
            ]
        ];

        $table = $this->client->createTable($schema);        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->client->deleteTable([
            "TableName" => $this->tableName,
        ]);
    }
}