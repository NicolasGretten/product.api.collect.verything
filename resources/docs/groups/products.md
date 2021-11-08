# Products


## Retrieve a product


Retrieve all product details.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'code'=> 'PROMO10',
        ],
        'json' => [
            'filters' => [
                'relations' => '["compositeProducts","availabilities","categories"]',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e"
);

let params = {
    "code": "PROMO10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "filters": {
        "relations": "[\"compositeProducts\",\"availabilities\",\"categories\"]"
    }
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e'
payload = {
    "filters": {
        "relations": "[\"compositeProducts\",\"availabilities\",\"categories\"]"
    }
}
params = {
  'code': 'PROMO10',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, json=payload, params=params)
response.json()
```

```bash
curl -X GET \
    -G "http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e?code=PROMO10" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"filters":{"relations":"[\"compositeProducts\",\"availabilities\",\"categories\"]"}}'

```


> Example response (200):

```json
{
    "timestamp": 1617200320,
    "signature": "c4ea4d3626a3311a73bbcaac30e54432",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prod_672832afc671d36c6213",
            "deleted_at": null,
            "created_at": "2021-03-29T09:31:00.000000Z",
            "updated_at": "2021-03-29T09:31:00.000000Z",
            "current_pricing": {
                "id": null,
                "price_including_taxes": 605,
                "price_excluding_taxes": 550,
                "vat_value": 55,
                "vat_rate": 10
            },
            "current_discount": {
                "id": "discount_fffbae84a65baa0a",
                "discount_type": "monetary",
                "amount": 50,
                "start_at": "2021-03-05 00:00:00",
                "end_at": "2021-05-25 00:00:00",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "promotional_code": null,
                "title": "traduction française",
                "text": "promo d'haloween"
            },
            "original_pricing": {
                "id": "prodprice_47a43509e35e375",
                "price_including_taxes": 660,
                "price_excluding_taxes": 600,
                "vat_value": 60,
                "vat_rate": 10
            },
            "discount": {
                "id": "discount_fffbae84a65baa0a",
                "discount_type": "monetary",
                "amount": 50,
                "start_at": "2021-03-05 00:00:00",
                "end_at": "2021-05-25 00:00:00",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "promotional_code": null,
                "title": "traduction française",
                "text": "promo d'haloween"
            },
            "title": "Traduction en français",
            "text": "Coworking 1h"
        }
    }
}
```
> Example response (200, Relations filter):

```json
{
    "timestamp": 1617200445,
    "signature": "ea39b7d5c4a9cd9388798021b6cdcd5c",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prod_672832afc671d36c6213",
            "deleted_at": null,
            "created_at": "2021-03-29T09:31:00.000000Z",
            "updated_at": "2021-03-29T09:31:00.000000Z",
            "current_pricing": {
                "id": null,
                "price_including_taxes": 605,
                "price_excluding_taxes": 550,
                "vat_value": 55,
                "vat_rate": 10
            },
            "current_discount": {
                "id": "discount_fffbae84a65baa0a",
                "discount_type": "monetary",
                "amount": 50,
                "start_at": "2021-03-05 00:00:00",
                "end_at": "2021-05-25 00:00:00",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "promotional_code": null,
                "title": "traduction française",
                "text": "promo d'haloween"
            },
            "original_pricing": {
                "id": "prodprice_47a43509e35e375",
                "price_including_taxes": 660,
                "price_excluding_taxes": 600,
                "vat_value": 60,
                "vat_rate": 10
            },
            "discount": {
                "id": "discount_fffbae84a65baa0a",
                "discount_type": "monetary",
                "amount": 50,
                "start_at": "2021-03-05 00:00:00",
                "end_at": "2021-05-25 00:00:00",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "promotional_code": null,
                "title": "traduction française",
                "text": "promo d'haloween"
            },
            "title": "Traduction en français",
            "text": "Coworking 1h",
            "composite_products": [],
            "availabilities": {
                "id": "prodavail_56189542ce89bd2",
                "product_id": "prod_672832afc671d36c6213",
                "days": [
                    "monday",
                    "tuesday",
                    "wednesday",
                    "thursday",
                    "friday"
                ],
                "hour_start": "10:30:00",
                "hour_end": "14:30:00",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z"
            },
            "categories": [
                {
                    "id": "cat_1ddf322d0c198c29b50ce",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:30:59.000000Z",
                    "updated_at": "2021-03-29T09:30:59.000000Z",
                    "discount": [
                        {
                            "id": "discount_34acc06c4ccd5022",
                            "discount_type": "percentage",
                            "amount": 10,
                            "start_at": "2021-03-05 00:00:00",
                            "end_at": "2021-05-25 00:00:00",
                            "deleted_at": null,
                            "created_at": "2021-03-29T09:31:00.000000Z",
                            "updated_at": "2021-03-29T09:31:00.000000Z",
                            "promotional_code": {
                                "id": "promocode_17d78ae0a3bfb0a",
                                "code": "PROMO10",
                                "number_used": 0,
                                "maximum_usage": 1,
                                "combinable_with_offers": false,
                                "deleted_at": null,
                                "created_at": "2021-03-29T09:31:00.000000Z",
                                "updated_at": "2021-03-29T09:31:00.000000Z",
                                "title": "Traduction en français",
                                "text": "Code promo 10%"
                            },
                            "title": "traduction française",
                            "text": "promo d'été"
                        }
                    ],
                    "title": "Traduction en français",
                    "text": "Boisson"
                }
            ]
        }
    }
}
```
> Example response (200, Use code promo):

```json
{
    "timestamp": 1617200465,
    "signature": "d3f71f7c48e64052f2885294fac8fa3f",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prod_672832afc671d36c6213",
            "deleted_at": null,
            "created_at": "2021-03-29T09:31:00.000000Z",
            "updated_at": "2021-03-29T09:31:00.000000Z",
            "current_pricing": {
                "id": null,
                "price_including_taxes": 594,
                "price_excluding_taxes": 540,
                "vat_value": 54,
                "vat_rate": 10
            },
            "current_discount": {
                "id": "discount_34acc06c4ccd5022",
                "discount_type": "percentage",
                "amount": 10,
                "start_at": "2021-03-05 00:00:00",
                "end_at": "2021-05-25 00:00:00",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "promotional_code": {
                    "id": "promocode_17d78ae0a3bfb0a",
                    "code": "PROMO10",
                    "number_used": 0,
                    "maximum_usage": 1,
                    "combinable_with_offers": false,
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z",
                    "title": "Traduction en français",
                    "text": "Code promo 10%"
                },
                "title": "traduction française",
                "text": "promo d'été"
            },
            "original_pricing": {
                "id": "prodprice_47a43509e35e375",
                "price_including_taxes": 660,
                "price_excluding_taxes": 600,
                "vat_value": 60,
                "vat_rate": 10
            },
            "discount": {
                "id": "discount_34acc06c4ccd5022",
                "discount_type": "percentage",
                "amount": 10,
                "start_at": "2021-03-05 00:00:00",
                "end_at": "2021-05-25 00:00:00",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "promotional_code": {
                    "id": "promocode_17d78ae0a3bfb0a",
                    "code": "PROMO10",
                    "number_used": 0,
                    "maximum_usage": 1,
                    "combinable_with_offers": false,
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z",
                    "title": "Traduction en français",
                    "text": "Code promo 10%"
                },
                "title": "traduction française",
                "text": "promo d'été"
            },
            "title": "Traduction en français",
            "text": "Coworking 1h"
        }
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`products/{product_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>product_id</b></code>&nbsp; <small>string</small>     <br>
    Product ID

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>code</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    Promotional code

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>filters[relations]</b></code>&nbsp; <small>Add</small>         <i>optional</i>    <br>
    a relation in the response



## List all products


List all the products.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://dev-product.api.hopn.space/products',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'items_id'=> '["prod_3a3d84897c39a40bc49e","prod_c93e0a2194593f85a7a6"]',
            'limit'=> '10',
            'page'=> '1',
            'code'=> 'PROMO10',
        ],
        'json' => [
            'filters' => [
                'created' => [
                    'gt' => '1602688060',
                    'gte' => '1602688060',
                    'lt' => '1602688060',
                    'lte' => '1602688060',
                    'order' => 'ASC',
                ],
                'updated' => [
                    'gt' => '1602688060',
                    'gte' => '1602688060',
                    'lt' => '1602688060',
                    'lte' => '1602688060',
                    'order' => 'ASC',
                ],
                'deleted' => [
                    'gt' => '1602688060',
                    'gte' => '1602688060',
                    'lt' => '1602688060',
                    'lte' => '1602688060',
                    'order' => 'ASC',
                ],
                'relations' => '["compositeProducts","availabilities","categories"]',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/products"
);

let params = {
    "items_id": "["prod_3a3d84897c39a40bc49e","prod_c93e0a2194593f85a7a6"]",
    "limit": "10",
    "page": "1",
    "code": "PROMO10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "filters": {
        "created": {
            "gt": "1602688060",
            "gte": "1602688060",
            "lt": "1602688060",
            "lte": "1602688060",
            "order": "ASC"
        },
        "updated": {
            "gt": "1602688060",
            "gte": "1602688060",
            "lt": "1602688060",
            "lte": "1602688060",
            "order": "ASC"
        },
        "deleted": {
            "gt": "1602688060",
            "gte": "1602688060",
            "lt": "1602688060",
            "lte": "1602688060",
            "order": "ASC"
        },
        "relations": "[\"compositeProducts\",\"availabilities\",\"categories\"]"
    }
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://dev-product.api.hopn.space/products'
payload = {
    "filters": {
        "created": {
            "gt": "1602688060",
            "gte": "1602688060",
            "lt": "1602688060",
            "lte": "1602688060",
            "order": "ASC"
        },
        "updated": {
            "gt": "1602688060",
            "gte": "1602688060",
            "lt": "1602688060",
            "lte": "1602688060",
            "order": "ASC"
        },
        "deleted": {
            "gt": "1602688060",
            "gte": "1602688060",
            "lt": "1602688060",
            "lte": "1602688060",
            "order": "ASC"
        },
        "relations": "[\"compositeProducts\",\"availabilities\",\"categories\"]"
    }
}
params = {
  'items_id': '["prod_3a3d84897c39a40bc49e","prod_c93e0a2194593f85a7a6"]',
  'limit': '10',
  'page': '1',
  'code': 'PROMO10',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, json=payload, params=params)
response.json()
```

```bash
curl -X GET \
    -G "http://dev-product.api.hopn.space/products?items_id=%5B%22prod_3a3d84897c39a40bc49e%22%2C%22prod_c93e0a2194593f85a7a6%22%5D&limit=10&page=1&code=PROMO10" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"filters":{"created":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"updated":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"deleted":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"relations":"[\"compositeProducts\",\"availabilities\",\"categories\"]"}}'

```


> Example response (200):

```json
{
    "timestamp": 1617200761,
    "signature": "c24ff8ae9318c07b40a12ded8df07b04",
    "content": {
        "success": true,
        "async": false,
        "pagination": {
            "current_page": 1,
            "last_page": 1,
            "per_page": 10,
            "total": 5,
            "next_page_url": null,
            "prev_page_url": null
        },
        "body": [
            {
                "id": "prod_3a3d84897c39a40bc49e",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "current_pricing": {
                    "id": "prodprice_511dda32151dddf",
                    "price_including_taxes": 110,
                    "price_excluding_taxes": 100,
                    "vat_value": 10,
                    "vat_rate": 10
                },
                "current_discount": null,
                "original_pricing": {
                    "id": "prodprice_511dda32151dddf",
                    "price_including_taxes": 110,
                    "price_excluding_taxes": 100,
                    "vat_value": 10,
                    "vat_rate": 10
                },
                "discount": null,
                "title": "Traduction en français",
                "text": "Croissant"
            },
            {
                "id": "prod_c93e0a2194593f85a7a6",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "current_pricing": {
                    "id": "prodprice_3169e3f7b71af10",
                    "price_including_taxes": 550,
                    "price_excluding_taxes": 500,
                    "vat_value": 50,
                    "vat_rate": 10
                },
                "current_discount": null,
                "original_pricing": {
                    "id": "prodprice_3169e3f7b71af10",
                    "price_including_taxes": 550,
                    "price_excluding_taxes": 500,
                    "vat_value": 50,
                    "vat_rate": 10
                },
                "discount": null,
                "title": "Traduction en français",
                "text": "Salade"
            },
            {
                "id": "prod_672832afc671d36c6213",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "current_pricing": {
                    "id": null,
                    "price_including_taxes": 605,
                    "price_excluding_taxes": 550,
                    "vat_value": 55,
                    "vat_rate": 10
                },
                "current_discount": {
                    "id": "discount_fffbae84a65baa0a",
                    "discount_type": "monetary",
                    "amount": 50,
                    "start_at": "2021-03-05 00:00:00",
                    "end_at": "2021-05-25 00:00:00",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z",
                    "promotional_code": null,
                    "title": "traduction française",
                    "text": "promo d'haloween"
                },
                "original_pricing": {
                    "id": "prodprice_47a43509e35e375",
                    "price_including_taxes": 660,
                    "price_excluding_taxes": 600,
                    "vat_value": 60,
                    "vat_rate": 10
                },
                "discount": {
                    "id": "discount_fffbae84a65baa0a",
                    "discount_type": "monetary",
                    "amount": 50,
                    "start_at": "2021-03-05 00:00:00",
                    "end_at": "2021-05-25 00:00:00",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z",
                    "promotional_code": null,
                    "title": "traduction française",
                    "text": "promo d'haloween"
                },
                "title": "Traduction en français",
                "text": "Coworking 1h"
            },
            {
                "id": "prod_1344f9b420f516b26861",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "current_pricing": {
                    "id": "prodprice_8d903e2d741bf4c",
                    "price_including_taxes": 110,
                    "price_excluding_taxes": 100,
                    "vat_value": 10,
                    "vat_rate": 10
                },
                "current_discount": null,
                "original_pricing": {
                    "id": "prodprice_8d903e2d741bf4c",
                    "price_including_taxes": 110,
                    "price_excluding_taxes": 100,
                    "vat_value": 10,
                    "vat_rate": 10
                },
                "discount": null,
                "title": "Traduction en français",
                "text": "café"
            },
            {
                "id": "prod_bc477fe21a7c92c52256",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "current_pricing": {
                    "id": "prodprice_e634719eaa3b3bd",
                    "price_including_taxes": 880,
                    "price_excluding_taxes": 800,
                    "vat_value": 80,
                    "vat_rate": 10
                },
                "current_discount": null,
                "original_pricing": {
                    "id": "prodprice_e634719eaa3b3bd",
                    "price_including_taxes": 880,
                    "price_excluding_taxes": 800,
                    "vat_value": 80,
                    "vat_rate": 10
                },
                "discount": null,
                "title": "Traduction en français",
                "text": "apéritif"
            }
        ]
    }
}
```
> Example response (200, Relations Filter):

```json
{
    "timestamp": 1617200789,
    "signature": "465827604b370635b57d7329be2e63ed",
    "content": {
        "success": true,
        "async": false,
        "pagination": {
            "current_page": 1,
            "last_page": 1,
            "per_page": 10,
            "total": 5,
            "next_page_url": null,
            "prev_page_url": null
        },
        "body": [
            {
                "id": "prod_3a3d84897c39a40bc49e",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "current_pricing": {
                    "id": "prodprice_511dda32151dddf",
                    "price_including_taxes": 110,
                    "price_excluding_taxes": 100,
                    "vat_value": 10,
                    "vat_rate": 10
                },
                "current_discount": null,
                "original_pricing": {
                    "id": "prodprice_511dda32151dddf",
                    "price_including_taxes": 110,
                    "price_excluding_taxes": 100,
                    "vat_value": 10,
                    "vat_rate": 10
                },
                "discount": null,
                "title": "Traduction en français",
                "text": "Croissant",
                "composite_products": [
                    {
                        "id": "prodc_05ba52372e3c09a8219",
                        "deleted_at": null,
                        "created_at": "2021-03-29T09:31:00.000000Z",
                        "updated_at": "2021-03-29T09:31:00.000000Z",
                        "current_pricing": {
                            "id": "prodcprice_4e0706a388edfd",
                            "composite_product_id": "prodc_05ba52372e3c09a8219",
                            "price_including_taxes": 660,
                            "price_excluding_taxes": 600,
                            "vat_value": 60,
                            "vat_rate": 10
                        },
                        "current_discount": null,
                        "original_pricing": {
                            "id": "prodcprice_4e0706a388edfd",
                            "composite_product_id": "prodc_05ba52372e3c09a8219",
                            "price_including_taxes": 660,
                            "price_excluding_taxes": 600,
                            "vat_value": 60,
                            "vat_rate": 10
                        },
                        "discount": null,
                        "title": "Traduction en français",
                        "text": "petit déjeuner"
                    }
                ],
                "availabilities": {
                    "id": "prodavail_8fc9ca2cb20ce51",
                    "product_id": "prod_3a3d84897c39a40bc49e",
                    "days": [
                        "monday",
                        "tuesday",
                        "wednesday",
                        "thursday",
                        "friday"
                    ],
                    "hour_start": "07:00:00",
                    "hour_end": "11:00:00",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z"
                },
                "categories": [
                    {
                        "id": "cat_d10be1a57a0fddafc85b5",
                        "deleted_at": null,
                        "created_at": "2021-03-29T09:30:59.000000Z",
                        "updated_at": "2021-03-29T09:30:59.000000Z",
                        "discount": null,
                        "title": "Traduction en français",
                        "text": "nourriture"
                    }
                ]
            },
            {
                "id": "prod_c93e0a2194593f85a7a6",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "current_pricing": {
                    "id": "prodprice_3169e3f7b71af10",
                    "price_including_taxes": 550,
                    "price_excluding_taxes": 500,
                    "vat_value": 50,
                    "vat_rate": 10
                },
                "current_discount": null,
                "original_pricing": {
                    "id": "prodprice_3169e3f7b71af10",
                    "price_including_taxes": 550,
                    "price_excluding_taxes": 500,
                    "vat_value": 50,
                    "vat_rate": 10
                },
                "discount": null,
                "title": "Traduction en français",
                "text": "Salade",
                "composite_products": [
                    {
                        "id": "prodc_05ba52372e3c09a8219",
                        "deleted_at": null,
                        "created_at": "2021-03-29T09:31:00.000000Z",
                        "updated_at": "2021-03-29T09:31:00.000000Z",
                        "current_pricing": {
                            "id": "prodcprice_4e0706a388edfd",
                            "composite_product_id": "prodc_05ba52372e3c09a8219",
                            "price_including_taxes": 660,
                            "price_excluding_taxes": 600,
                            "vat_value": 60,
                            "vat_rate": 10
                        },
                        "current_discount": null,
                        "original_pricing": {
                            "id": "prodcprice_4e0706a388edfd",
                            "composite_product_id": "prodc_05ba52372e3c09a8219",
                            "price_including_taxes": 660,
                            "price_excluding_taxes": 600,
                            "vat_value": 60,
                            "vat_rate": 10
                        },
                        "discount": null,
                        "title": "Traduction en français",
                        "text": "petit déjeuner"
                    }
                ],
                "availabilities": {
                    "id": "prodavail_6296051afe5fa19",
                    "product_id": "prod_c93e0a2194593f85a7a6",
                    "days": [
                        "monday",
                        "tuesday",
                        "wednesday",
                        "thursday",
                        "friday"
                    ],
                    "hour_start": "11:30:00",
                    "hour_end": "13:30:00",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z"
                },
                "categories": [
                    {
                        "id": "cat_d10be1a57a0fddafc85b5",
                        "deleted_at": null,
                        "created_at": "2021-03-29T09:30:59.000000Z",
                        "updated_at": "2021-03-29T09:30:59.000000Z",
                        "discount": null,
                        "title": "Traduction en français",
                        "text": "nourriture"
                    }
                ]
            },
            {
                "id": "prod_672832afc671d36c6213",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "current_pricing": {
                    "id": null,
                    "price_including_taxes": 605,
                    "price_excluding_taxes": 550,
                    "vat_value": 55,
                    "vat_rate": 10
                },
                "current_discount": {
                    "id": "discount_fffbae84a65baa0a",
                    "discount_type": "monetary",
                    "amount": 50,
                    "start_at": "2021-03-05 00:00:00",
                    "end_at": "2021-05-25 00:00:00",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z",
                    "promotional_code": null,
                    "title": "traduction française",
                    "text": "promo d'haloween"
                },
                "original_pricing": {
                    "id": "prodprice_47a43509e35e375",
                    "price_including_taxes": 660,
                    "price_excluding_taxes": 600,
                    "vat_value": 60,
                    "vat_rate": 10
                },
                "discount": {
                    "id": "discount_fffbae84a65baa0a",
                    "discount_type": "monetary",
                    "amount": 50,
                    "start_at": "2021-03-05 00:00:00",
                    "end_at": "2021-05-25 00:00:00",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z",
                    "promotional_code": null,
                    "title": "traduction française",
                    "text": "promo d'haloween"
                },
                "title": "Traduction en français",
                "text": "Coworking 1h",
                "composite_products": [],
                "availabilities": {
                    "id": "prodavail_56189542ce89bd2",
                    "product_id": "prod_672832afc671d36c6213",
                    "days": [
                        "monday",
                        "tuesday",
                        "wednesday",
                        "thursday",
                        "friday"
                    ],
                    "hour_start": "10:30:00",
                    "hour_end": "14:30:00",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z"
                },
                "categories": [
                    {
                        "id": "cat_1ddf322d0c198c29b50ce",
                        "deleted_at": null,
                        "created_at": "2021-03-29T09:30:59.000000Z",
                        "updated_at": "2021-03-29T09:30:59.000000Z",
                        "discount": [
                            {
                                "id": "discount_34acc06c4ccd5022",
                                "discount_type": "percentage",
                                "amount": 10,
                                "start_at": "2021-03-05 00:00:00",
                                "end_at": "2021-05-25 00:00:00",
                                "deleted_at": null,
                                "created_at": "2021-03-29T09:31:00.000000Z",
                                "updated_at": "2021-03-29T09:31:00.000000Z",
                                "promotional_code": {
                                    "id": "promocode_17d78ae0a3bfb0a",
                                    "code": "PROMO10",
                                    "number_used": 0,
                                    "maximum_usage": 1,
                                    "combinable_with_offers": false,
                                    "deleted_at": null,
                                    "created_at": "2021-03-29T09:31:00.000000Z",
                                    "updated_at": "2021-03-29T09:31:00.000000Z",
                                    "title": "Traduction en français",
                                    "text": "Code promo 10%"
                                },
                                "title": "traduction française",
                                "text": "promo d'été"
                            }
                        ],
                        "title": "Traduction en français",
                        "text": "Boisson"
                    }
                ]
            },
            {
                "id": "prod_1344f9b420f516b26861",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "current_pricing": {
                    "id": "prodprice_8d903e2d741bf4c",
                    "price_including_taxes": 110,
                    "price_excluding_taxes": 100,
                    "vat_value": 10,
                    "vat_rate": 10
                },
                "current_discount": null,
                "original_pricing": {
                    "id": "prodprice_8d903e2d741bf4c",
                    "price_including_taxes": 110,
                    "price_excluding_taxes": 100,
                    "vat_value": 10,
                    "vat_rate": 10
                },
                "discount": null,
                "title": "Traduction en français",
                "text": "café",
                "composite_products": [
                    {
                        "id": "prodc_bb6bca80cb0ac3484fb",
                        "deleted_at": null,
                        "created_at": "2021-03-29T09:31:00.000000Z",
                        "updated_at": "2021-03-29T09:31:00.000000Z",
                        "current_pricing": {
                            "id": "prodcprice_4c079f8a1647ea",
                            "composite_product_id": "prodc_bb6bca80cb0ac3484fb",
                            "price_including_taxes": 1100,
                            "price_excluding_taxes": 1000,
                            "vat_value": 100,
                            "vat_rate": 10
                        },
                        "current_discount": null,
                        "original_pricing": {
                            "id": "prodcprice_4c079f8a1647ea",
                            "composite_product_id": "prodc_bb6bca80cb0ac3484fb",
                            "price_including_taxes": 1100,
                            "price_excluding_taxes": 1000,
                            "vat_value": 100,
                            "vat_rate": 10
                        },
                        "discount": null,
                        "title": "Traduction en français",
                        "text": "déjeuner"
                    }
                ],
                "availabilities": {
                    "id": "prodavail_6e0ea6f0367e25d",
                    "product_id": "prod_1344f9b420f516b26861",
                    "days": [
                        "monday",
                        "tuesday",
                        "wednesday",
                        "thursday",
                        "friday"
                    ],
                    "hour_start": "08:00:00",
                    "hour_end": "18:00:00",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z"
                },
                "categories": [
                    {
                        "id": "cat_1ddf322d0c198c29b50ce",
                        "deleted_at": null,
                        "created_at": "2021-03-29T09:30:59.000000Z",
                        "updated_at": "2021-03-29T09:30:59.000000Z",
                        "discount": [
                            {
                                "id": "discount_34acc06c4ccd5022",
                                "discount_type": "percentage",
                                "amount": 10,
                                "start_at": "2021-03-05 00:00:00",
                                "end_at": "2021-05-25 00:00:00",
                                "deleted_at": null,
                                "created_at": "2021-03-29T09:31:00.000000Z",
                                "updated_at": "2021-03-29T09:31:00.000000Z",
                                "promotional_code": {
                                    "id": "promocode_17d78ae0a3bfb0a",
                                    "code": "PROMO10",
                                    "number_used": 0,
                                    "maximum_usage": 1,
                                    "combinable_with_offers": false,
                                    "deleted_at": null,
                                    "created_at": "2021-03-29T09:31:00.000000Z",
                                    "updated_at": "2021-03-29T09:31:00.000000Z",
                                    "title": "Traduction en français",
                                    "text": "Code promo 10%"
                                },
                                "title": "traduction française",
                                "text": "promo d'été"
                            }
                        ],
                        "title": "Traduction en français",
                        "text": "Boisson"
                    }
                ]
            },
            {
                "id": "prod_bc477fe21a7c92c52256",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "current_pricing": {
                    "id": "prodprice_e634719eaa3b3bd",
                    "price_including_taxes": 880,
                    "price_excluding_taxes": 800,
                    "vat_value": 80,
                    "vat_rate": 10
                },
                "current_discount": null,
                "original_pricing": {
                    "id": "prodprice_e634719eaa3b3bd",
                    "price_including_taxes": 880,
                    "price_excluding_taxes": 800,
                    "vat_value": 80,
                    "vat_rate": 10
                },
                "discount": null,
                "title": "Traduction en français",
                "text": "apéritif",
                "composite_products": [],
                "availabilities": {
                    "id": "prodavail_8d5f40e584e33d8",
                    "product_id": "prod_bc477fe21a7c92c52256",
                    "days": [
                        "monday",
                        "tuesday",
                        "wednesday",
                        "thursday",
                        "friday"
                    ],
                    "hour_start": "18:00:00",
                    "hour_end": "23:30:00",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z"
                },
                "categories": [
                    {
                        "id": "cat_1ddf322d0c198c29b50ce",
                        "deleted_at": null,
                        "created_at": "2021-03-29T09:30:59.000000Z",
                        "updated_at": "2021-03-29T09:30:59.000000Z",
                        "discount": [
                            {
                                "id": "discount_34acc06c4ccd5022",
                                "discount_type": "percentage",
                                "amount": 10,
                                "start_at": "2021-03-05 00:00:00",
                                "end_at": "2021-05-25 00:00:00",
                                "deleted_at": null,
                                "created_at": "2021-03-29T09:31:00.000000Z",
                                "updated_at": "2021-03-29T09:31:00.000000Z",
                                "promotional_code": {
                                    "id": "promocode_17d78ae0a3bfb0a",
                                    "code": "PROMO10",
                                    "number_used": 0,
                                    "maximum_usage": 1,
                                    "combinable_with_offers": false,
                                    "deleted_at": null,
                                    "created_at": "2021-03-29T09:31:00.000000Z",
                                    "updated_at": "2021-03-29T09:31:00.000000Z",
                                    "title": "Traduction en français",
                                    "text": "Code promo 10%"
                                },
                                "title": "traduction française",
                                "text": "promo d'été"
                            }
                        ],
                        "title": "Traduction en français",
                        "text": "Boisson"
                    }
                ]
            }
        ]
    }
}
```
> Example response (200, Use code promo):

```json
{
    "timestamp": 1617200809,
    "signature": "dc10765772311d254227f5e33251851f",
    "content": {
        "success": true,
        "async": false,
        "pagination": {
            "current_page": 1,
            "last_page": 1,
            "per_page": 10,
            "total": 5,
            "next_page_url": null,
            "prev_page_url": null
        },
        "body": [
            {
                "id": "prod_3a3d84897c39a40bc49e",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "current_pricing": {
                    "id": null,
                    "price_including_taxes": 99,
                    "price_excluding_taxes": 90,
                    "vat_value": 9,
                    "vat_rate": 10
                },
                "current_discount": {
                    "id": "discount_34acc06c4ccd5022",
                    "discount_type": "percentage",
                    "amount": 10,
                    "start_at": "2021-03-05 00:00:00",
                    "end_at": "2021-05-25 00:00:00",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z",
                    "promotional_code": {
                        "id": "promocode_17d78ae0a3bfb0a",
                        "code": "PROMO10",
                        "number_used": 0,
                        "maximum_usage": 1,
                        "combinable_with_offers": false,
                        "deleted_at": null,
                        "created_at": "2021-03-29T09:31:00.000000Z",
                        "updated_at": "2021-03-29T09:31:00.000000Z",
                        "title": "Traduction en français",
                        "text": "Code promo 10%"
                    },
                    "title": "traduction française",
                    "text": "promo d'été"
                },
                "original_pricing": {
                    "id": "prodprice_511dda32151dddf",
                    "price_including_taxes": 110,
                    "price_excluding_taxes": 100,
                    "vat_value": 10,
                    "vat_rate": 10
                },
                "discount": {
                    "id": "discount_34acc06c4ccd5022",
                    "discount_type": "percentage",
                    "amount": 10,
                    "start_at": "2021-03-05 00:00:00",
                    "end_at": "2021-05-25 00:00:00",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z",
                    "promotional_code": {
                        "id": "promocode_17d78ae0a3bfb0a",
                        "code": "PROMO10",
                        "number_used": 0,
                        "maximum_usage": 1,
                        "combinable_with_offers": false,
                        "deleted_at": null,
                        "created_at": "2021-03-29T09:31:00.000000Z",
                        "updated_at": "2021-03-29T09:31:00.000000Z",
                        "title": "Traduction en français",
                        "text": "Code promo 10%"
                    },
                    "title": "traduction française",
                    "text": "promo d'été"
                },
                "title": "Traduction en français",
                "text": "Croissant"
            },
            {
                "id": "prod_c93e0a2194593f85a7a6",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "current_pricing": {
                    "id": "prodprice_3169e3f7b71af10",
                    "price_including_taxes": 550,
                    "price_excluding_taxes": 500,
                    "vat_value": 50,
                    "vat_rate": 10
                },
                "current_discount": null,
                "original_pricing": {
                    "id": "prodprice_3169e3f7b71af10",
                    "price_including_taxes": 550,
                    "price_excluding_taxes": 500,
                    "vat_value": 50,
                    "vat_rate": 10
                },
                "discount": null,
                "title": "Traduction en français",
                "text": "Salade"
            },
            {
                "id": "prod_672832afc671d36c6213",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "current_pricing": {
                    "id": null,
                    "price_including_taxes": 594,
                    "price_excluding_taxes": 540,
                    "vat_value": 54,
                    "vat_rate": 10
                },
                "current_discount": {
                    "id": "discount_34acc06c4ccd5022",
                    "discount_type": "percentage",
                    "amount": 10,
                    "start_at": "2021-03-05 00:00:00",
                    "end_at": "2021-05-25 00:00:00",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z",
                    "promotional_code": {
                        "id": "promocode_17d78ae0a3bfb0a",
                        "code": "PROMO10",
                        "number_used": 0,
                        "maximum_usage": 1,
                        "combinable_with_offers": false,
                        "deleted_at": null,
                        "created_at": "2021-03-29T09:31:00.000000Z",
                        "updated_at": "2021-03-29T09:31:00.000000Z",
                        "title": "Traduction en français",
                        "text": "Code promo 10%"
                    },
                    "title": "traduction française",
                    "text": "promo d'été"
                },
                "original_pricing": {
                    "id": "prodprice_47a43509e35e375",
                    "price_including_taxes": 660,
                    "price_excluding_taxes": 600,
                    "vat_value": 60,
                    "vat_rate": 10
                },
                "discount": {
                    "id": "discount_34acc06c4ccd5022",
                    "discount_type": "percentage",
                    "amount": 10,
                    "start_at": "2021-03-05 00:00:00",
                    "end_at": "2021-05-25 00:00:00",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z",
                    "promotional_code": {
                        "id": "promocode_17d78ae0a3bfb0a",
                        "code": "PROMO10",
                        "number_used": 0,
                        "maximum_usage": 1,
                        "combinable_with_offers": false,
                        "deleted_at": null,
                        "created_at": "2021-03-29T09:31:00.000000Z",
                        "updated_at": "2021-03-29T09:31:00.000000Z",
                        "title": "Traduction en français",
                        "text": "Code promo 10%"
                    },
                    "title": "traduction française",
                    "text": "promo d'été"
                },
                "title": "Traduction en français",
                "text": "Coworking 1h"
            },
            {
                "id": "prod_1344f9b420f516b26861",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "current_pricing": {
                    "id": null,
                    "price_including_taxes": 99,
                    "price_excluding_taxes": 90,
                    "vat_value": 9,
                    "vat_rate": 10
                },
                "current_discount": {
                    "id": "discount_34acc06c4ccd5022",
                    "discount_type": "percentage",
                    "amount": 10,
                    "start_at": "2021-03-05 00:00:00",
                    "end_at": "2021-05-25 00:00:00",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z",
                    "promotional_code": {
                        "id": "promocode_17d78ae0a3bfb0a",
                        "code": "PROMO10",
                        "number_used": 0,
                        "maximum_usage": 1,
                        "combinable_with_offers": false,
                        "deleted_at": null,
                        "created_at": "2021-03-29T09:31:00.000000Z",
                        "updated_at": "2021-03-29T09:31:00.000000Z",
                        "title": "Traduction en français",
                        "text": "Code promo 10%"
                    },
                    "title": "traduction française",
                    "text": "promo d'été"
                },
                "original_pricing": {
                    "id": "prodprice_8d903e2d741bf4c",
                    "price_including_taxes": 110,
                    "price_excluding_taxes": 100,
                    "vat_value": 10,
                    "vat_rate": 10
                },
                "discount": {
                    "id": "discount_34acc06c4ccd5022",
                    "discount_type": "percentage",
                    "amount": 10,
                    "start_at": "2021-03-05 00:00:00",
                    "end_at": "2021-05-25 00:00:00",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z",
                    "promotional_code": {
                        "id": "promocode_17d78ae0a3bfb0a",
                        "code": "PROMO10",
                        "number_used": 0,
                        "maximum_usage": 1,
                        "combinable_with_offers": false,
                        "deleted_at": null,
                        "created_at": "2021-03-29T09:31:00.000000Z",
                        "updated_at": "2021-03-29T09:31:00.000000Z",
                        "title": "Traduction en français",
                        "text": "Code promo 10%"
                    },
                    "title": "traduction française",
                    "text": "promo d'été"
                },
                "title": "Traduction en français",
                "text": "café"
            },
            {
                "id": "prod_bc477fe21a7c92c52256",
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "current_pricing": {
                    "id": null,
                    "price_including_taxes": 792,
                    "price_excluding_taxes": 720,
                    "vat_value": 72,
                    "vat_rate": 10
                },
                "current_discount": {
                    "id": "discount_34acc06c4ccd5022",
                    "discount_type": "percentage",
                    "amount": 10,
                    "start_at": "2021-03-05 00:00:00",
                    "end_at": "2021-05-25 00:00:00",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z",
                    "promotional_code": {
                        "id": "promocode_17d78ae0a3bfb0a",
                        "code": "PROMO10",
                        "number_used": 0,
                        "maximum_usage": 1,
                        "combinable_with_offers": false,
                        "deleted_at": null,
                        "created_at": "2021-03-29T09:31:00.000000Z",
                        "updated_at": "2021-03-29T09:31:00.000000Z",
                        "title": "Traduction en français",
                        "text": "Code promo 10%"
                    },
                    "title": "traduction française",
                    "text": "promo d'été"
                },
                "original_pricing": {
                    "id": "prodprice_e634719eaa3b3bd",
                    "price_including_taxes": 880,
                    "price_excluding_taxes": 800,
                    "vat_value": 80,
                    "vat_rate": 10
                },
                "discount": {
                    "id": "discount_34acc06c4ccd5022",
                    "discount_type": "percentage",
                    "amount": 10,
                    "start_at": "2021-03-05 00:00:00",
                    "end_at": "2021-05-25 00:00:00",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z",
                    "promotional_code": {
                        "id": "promocode_17d78ae0a3bfb0a",
                        "code": "PROMO10",
                        "number_used": 0,
                        "maximum_usage": 1,
                        "combinable_with_offers": false,
                        "deleted_at": null,
                        "created_at": "2021-03-29T09:31:00.000000Z",
                        "updated_at": "2021-03-29T09:31:00.000000Z",
                        "title": "Traduction en français",
                        "text": "Code promo 10%"
                    },
                    "title": "traduction française",
                    "text": "promo d'été"
                },
                "title": "Traduction en français",
                "text": "apéritif"
            }
        ]
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`products`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>items_id</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    The items ID list to retrieve.

<code><b>limit</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    Number of results per pagination page

<code><b>page</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    Current page number for pagination

<code><b>code</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    Promotional code

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>filters[created][gt]</b></code>&nbsp; <small>Creation</small>         <i>optional</i>    <br>
    datetime is Greater Than this value.

<code><b>filters[created][gte]</b></code>&nbsp; <small>Creation</small>         <i>optional</i>    <br>
    datetime is Greater Than or Equal to this value

<code><b>filters[created][lt]</b></code>&nbsp; <small>Creation</small>         <i>optional</i>    <br>
    datetime is Less Than this value

<code><b>filters[created][lte]</b></code>&nbsp; <small>Creation</small>         <i>optional</i>    <br>
    datetime is Less Than or Equal to this value

<code><b>filters[created][order]</b></code>&nbsp; <small>Sort</small>         <i>optional</i>    <br>
    the results in the order given

<code><b>filters[updated][gt]</b></code>&nbsp; <small>Update</small>         <i>optional</i>    <br>
    datetime is Greater Than this value.

<code><b>filters[updated][gte]</b></code>&nbsp; <small>Update</small>         <i>optional</i>    <br>
    datetime is Greater Than or Equal to this value

<code><b>filters[updated][lt]</b></code>&nbsp; <small>Update</small>         <i>optional</i>    <br>
    datetime is Less Than this value

<code><b>filters[updated][lte]</b></code>&nbsp; <small>Update</small>         <i>optional</i>    <br>
    datetime is Less Than or Equal to this value

<code><b>filters[updated][order]</b></code>&nbsp; <small>Sort</small>         <i>optional</i>    <br>
    the results in the order given

<code><b>filters[deleted][gt]</b></code>&nbsp; <small>Deletion</small>         <i>optional</i>    <br>
    datetime is Greater Than this value.

<code><b>filters[deleted][gte]</b></code>&nbsp; <small>Deletion</small>         <i>optional</i>    <br>
    datetime is Greater Than or Equal to this value

<code><b>filters[deleted][lt]</b></code>&nbsp; <small>Deletion</small>         <i>optional</i>    <br>
    datetime is Less Than this value

<code><b>filters[deleted][lte]</b></code>&nbsp; <small>Deletion</small>         <i>optional</i>    <br>
    datetime is Less Than or Equal to this value

<code><b>filters[deleted][order]</b></code>&nbsp; <small>Sort</small>         <i>optional</i>    <br>
    the results in the order given

<code><b>filters[relations]</b></code>&nbsp; <small>Add</small>         <i>optional</i>    <br>
    a relation in the response



## Create a product


Allows you to create a new product.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://dev-product.api.hopn.space/products',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'title'=> 'Traduction française',
            'locale'=> 'fr-FR',
            'text'=> 'spa',
            'price_including_taxes'=> '120',
            'price_excluding_taxes'=> '100',
            'vat_value'=> '20',
            'vat_rate'=> '20',
            'day'=> '["monday","tuesday","wednesday"]',
            'hour_start'=> '08:00:00',
            'hour_end'=> '10:00:00',
            'category_id'=> 'cat_d10be1a57a0fddafc85b5',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/products"
);

let params = {
    "title": "Traduction française",
    "locale": "fr-FR",
    "text": "spa",
    "price_including_taxes": "120",
    "price_excluding_taxes": "100",
    "vat_value": "20",
    "vat_rate": "20",
    "day": "["monday","tuesday","wednesday"]",
    "hour_start": "08:00:00",
    "hour_end": "10:00:00",
    "category_id": "cat_d10be1a57a0fddafc85b5",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://dev-product.api.hopn.space/products'
params = {
  'title': 'Traduction française',
  'locale': 'fr-FR',
  'text': 'spa',
  'price_including_taxes': '120',
  'price_excluding_taxes': '100',
  'vat_value': '20',
  'vat_rate': '20',
  'day': '["monday","tuesday","wednesday"]',
  'hour_start': '08:00:00',
  'hour_end': '10:00:00',
  'category_id': 'cat_d10be1a57a0fddafc85b5',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, params=params)
response.json()
```

```bash
curl -X POST \
    "http://dev-product.api.hopn.space/products?title=Traduction+fran%C3%A7aise&locale=fr-FR&text=spa&price_including_taxes=120&price_excluding_taxes=100&vat_value=20&vat_rate=20&day=%5B%22monday%22%2C%22tuesday%22%2C%22wednesday%22%5D&hour_start=08%3A00%3A00&hour_end=10%3A00%3A00&category_id=cat_d10be1a57a0fddafc85b5" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1617200890,
    "signature": "220b933098e9df380fc876202199e095",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prod_19ad05fce8103175db0e",
            "updated_at": "2021-03-31T14:28:10.000000Z",
            "created_at": "2021-03-31T14:28:10.000000Z",
            "availability": {
                "id": "prodavail_bbe3e8218fcddc7",
                "product_id": "prod_19ad05fce8103175db0e",
                "days": [
                    "monday",
                    "tuesday",
                    "wednesday",
                    "friday"
                ],
                "hour_start": "08:00:00",
                "hour_end": "18:00:00",
                "updated_at": "2021-03-31T14:28:10.000000Z",
                "created_at": "2021-03-31T14:28:10.000000Z"
            },
            "price": {
                "id": "prodprice_99fc0e124cd4fe8",
                "product_id": "prod_19ad05fce8103175db0e",
                "price_including_taxes": "110",
                "price_excluding_taxes": "100",
                "vat_value": "10",
                "vat_rate": "10",
                "updated_at": "2021-03-31T14:28:10.000000Z",
                "created_at": "2021-03-31T14:28:10.000000Z"
            },
            "category": {
                "id": "prodcat_d275abcad445251b2",
                "product_id": "prod_19ad05fce8103175db0e",
                "category_id": "cat_1ddf322d0c198c29b50ce",
                "updated_at": "2021-03-31T14:28:10.000000Z",
                "created_at": "2021-03-31T14:28:10.000000Z"
            },
            "current_pricing": {
                "id": "prodprice_99fc0e124cd4fe8",
                "price_including_taxes": 110,
                "price_excluding_taxes": 100,
                "vat_value": 10,
                "vat_rate": 10
            },
            "current_discount": null,
            "original_pricing": {
                "id": "prodprice_99fc0e124cd4fe8",
                "price_including_taxes": 110,
                "price_excluding_taxes": 100,
                "vat_value": 10,
                "vat_rate": 10
            },
            "discount": null,
            "title": "Traduction française",
            "text": "heure de coworking"
        }
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`products`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>title</b></code>&nbsp; <small>string</small>     <br>
    Title of the description

<code><b>locale</b></code>&nbsp; <small>string</small>     <br>
    Locale

<code><b>text</b></code>&nbsp; <small>string</small>     <br>
    Description

<code><b>price_including_taxes</b></code>&nbsp; <small>string</small>     <br>
    New price including taxes

<code><b>price_excluding_taxes</b></code>&nbsp; <small>string</small>     <br>
    New price excluding taxes

<code><b>vat_value</b></code>&nbsp; <small>string</small>     <br>
    New vat value

<code><b>vat_rate</b></code>&nbsp; <small>string</small>     <br>
    New vat rate

<code><b>day</b></code>&nbsp; <small>string</small>     <br>
    day available

<code><b>hour_start</b></code>&nbsp; <small>string</small>     <br>
    Hour start

<code><b>hour_end</b></code>&nbsp; <small>string</small>     <br>
    Hour end

<code><b>category_id</b></code>&nbsp; <small>string</small>     <br>
    Category ID



## Delete a product


Delete a product and anonymize the data.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers)
response.json()
```

```bash
curl -X DELETE \
    "http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1617267553,
    "signature": "ec240e326c65fce17cd8664b9c0dfa3a",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prod_3a3d84897c39a40bc49e",
            "deleted_at": "2021-04-01T08:59:13.000000Z",
            "created_at": "2021-03-29T09:31:00.000000Z",
            "updated_at": "2021-04-01T08:59:13.000000Z",
            "title": null,
            "text": null
        }
    }
}
```

### Request
<small class="badge badge-red">DELETE</small>
 **`products/{product_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>product_id</b></code>&nbsp; <small>string</small>     <br>
    Product ID



## Translate a product&#039;s description


Allow you to translate a product's description

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/translate',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'locale'=> 'en-US',
            'title'=> 'English translations',
            'text'=> 'Spa',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/translate"
);

let params = {
    "locale": "en-US",
    "title": "English translations",
    "text": "Spa",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/translate'
params = {
  'locale': 'en-US',
  'title': 'English translations',
  'text': 'Spa',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, params=params)
response.json()
```

```bash
curl -X POST \
    "http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/translate?locale=en-US&title=English+translations&text=Spa" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1616157819,
    "signature": "b34ed9a9b00a6727b3dc8b27744231ba",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodtrad_b4fe383159a25e54",
            "product_id": "prod_3a3d84897c39a40bc49e",
            "locale": "en-US",
            "title": "English translation",
            "text": "croissant",
            "deleted_at": null,
            "created_at": "2021-03-19T12:43:39.000000Z",
            "updated_at": "2021-03-19T12:43:39.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`products/{product_id}/translate`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>product_id</b></code>&nbsp; <small>string</small>     <br>
    Product ID

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>locale</b></code>&nbsp; <small>string</small>     <br>
    Locale

<code><b>title</b></code>&nbsp; <small>string</small>     <br>
    The title of the translation

<code><b>text</b></code>&nbsp; <small>string</small>     <br>
    The description of the product translated



## Remove a product&#039;s description translation


Allow you to remove a product's description translation.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/translate',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'locale'=> 'en-US',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/translate"
);

let params = {
    "locale": "en-US",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/translate'
params = {
  'locale': 'en-US',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers, params=params)
response.json()
```

```bash
curl -X DELETE \
    "http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/translate?locale=en-US" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1616157840,
    "signature": "f455075f795cd705926adcd10acb1421",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodtrad_b4fe383159a25e54",
            "product_id": "prod_3a3d84897c39a40bc49e",
            "locale": "en-US",
            "title": "English translation",
            "text": "croissant",
            "deleted_at": "2021-03-19T12:44:00.000000Z",
            "created_at": "2021-03-19T12:43:39.000000Z",
            "updated_at": "2021-03-19T12:44:00.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-red">DELETE</small>
 **`products/{product_id}/translate`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>product_id</b></code>&nbsp; <small>string</small>     <br>
    Product ID

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>locale</b></code>&nbsp; <small>string</small>     <br>
    Locale



## Update a product price


You can update product price data.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/price/prodprice_4e9a60b280a60e5',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'price_including_taxes'=> '120',
            'price_excluding_taxes'=> '100',
            'vat_value'=> '20',
            'vat_rate'=> '20',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/price/prodprice_4e9a60b280a60e5"
);

let params = {
    "price_including_taxes": "120",
    "price_excluding_taxes": "100",
    "vat_value": "20",
    "vat_rate": "20",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PATCH",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/price/prodprice_4e9a60b280a60e5'
params = {
  'price_including_taxes': '120',
  'price_excluding_taxes': '100',
  'vat_value': '20',
  'vat_rate': '20',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('PATCH', url, headers=headers, params=params)
response.json()
```

```bash
curl -X PATCH \
    "http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/price/prodprice_4e9a60b280a60e5?price_including_taxes=120&price_excluding_taxes=100&vat_value=20&vat_rate=20" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1616157703,
    "signature": "9442b07053d533fd9ea2bf4336c2c2c0",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodprice_0d9798e7dcecf9f",
            "product_id": "prod_3a3d84897c39a40bc49e",
            "price_including_taxes": "12000",
            "price_excluding_taxes": "10000",
            "vat_value": "2000",
            "vat_rate": "20",
            "updated_at": "2021-03-19T12:41:43.000000Z",
            "created_at": "2021-03-19T12:41:43.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-purple">PATCH</small>
 **`products/{product_id}/price/{product_price_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>product_id</b></code>&nbsp; <small>string</small>     <br>
    Id of the product to update

<code><b>product_price_id</b></code>&nbsp; <small>string</small>     <br>
    Id of the product price to update

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>price_including_taxes</b></code>&nbsp; <small>string</small>     <br>
    New price including taxes

<code><b>price_excluding_taxes</b></code>&nbsp; <small>string</small>     <br>
    New price excluding taxes

<code><b>vat_value</b></code>&nbsp; <small>string</small>     <br>
    New vat value

<code><b>vat_rate</b></code>&nbsp; <small>string</small>     <br>
    New vat rate



## Update a product availabilities


You can update product availabilities data.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/availability',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'day'=> '["monday","tuesday","wednesday"]',
            'hour_start'=> '08:00:00',
            'hour_end'=> '10:00:00',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/availability"
);

let params = {
    "day": "["monday","tuesday","wednesday"]",
    "hour_start": "08:00:00",
    "hour_end": "10:00:00",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PATCH",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/availability'
params = {
  'day': '["monday","tuesday","wednesday"]',
  'hour_start': '08:00:00',
  'hour_end': '10:00:00',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('PATCH', url, headers=headers, params=params)
response.json()
```

```bash
curl -X PATCH \
    "http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/availability?day=%5B%22monday%22%2C%22tuesday%22%2C%22wednesday%22%5D&hour_start=08%3A00%3A00&hour_end=10%3A00%3A00" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1616157720,
    "signature": "4ec7fc712ca8d7a940f78d2f4bb6bbcb",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodavail_d73bfb3c6a1cc6a",
            "product_id": "prod_3a3d84897c39a40bc49e",
            "days": [
                "monday",
                "tuesday",
                "friday"
            ],
            "hour_start": "08:00:00",
            "hour_end": "18:00:00",
            "deleted_at": null,
            "created_at": "2021-03-19T12:17:31.000000Z",
            "updated_at": "2021-03-19T12:42:00.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-purple">PATCH</small>
 **`products/{product_id}/availability`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>product_id</b></code>&nbsp; <small>string</small>     <br>
    Id of the product to update

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>day</b></code>&nbsp; <small>string</small>     <br>
    day available

<code><b>hour_start</b></code>&nbsp; <small>string</small>     <br>
    Hour start

<code><b>hour_end</b></code>&nbsp; <small>string</small>     <br>
    Hour end



## Update a product category


You can update product category data.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/category',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'category_id'=> 'cat_d10be1a57a0fddafc85b5',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/category"
);

let params = {
    "category_id": "cat_d10be1a57a0fddafc85b5",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PATCH",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/category'
params = {
  'category_id': 'cat_d10be1a57a0fddafc85b5',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('PATCH', url, headers=headers, params=params)
response.json()
```

```bash
curl -X PATCH \
    "http://dev-product.api.hopn.space/products/prod_3a3d84897c39a40bc49e/category?category_id=cat_d10be1a57a0fddafc85b5" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1616157733,
    "signature": "4adbd1399b04804220eedaa35c23e713",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodcat76afae36c8fed70072",
            "product_id": "prod_3a3d84897c39a40bc49e",
            "category_id": "cat_bcc3b36c2dd0ae4a1c57c",
            "deleted_at": null,
            "created_at": "2021-03-19T12:17:31.000000Z",
            "updated_at": "2021-03-19T12:42:13.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-purple">PATCH</small>
 **`products/{product_id}/category`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>product_id</b></code>&nbsp; <small>string</small>     <br>
    Id of the product to update

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>category_id</b></code>&nbsp; <small>string</small>     <br>
    Category ID




