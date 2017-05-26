# Introduction

This repository contains sample code which invokes play-cricket.com api. The api return match details for a club.

**Lambda** folder contains sample code for lambda function which invoke play-criket api. You should export this function via AWS API Gateway if you would like to consume it on a client. For more information, see [Create an API Gateway API for AWS Lambda Functions](http://docs.aws.amazon.com/apigateway/latest/developerguide/integrating-api-with-aws-services-lambda.html)

**php** folder contain sample php code which also invoke play-cricket api and show the match detail in a table. 