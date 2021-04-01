# Discounts


## Retrieve a discount


Retrieve all discount details.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'filters' => [
                'relations' => '["compositeProducts","products","categories"]',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "filters": {
        "relations": "[\"compositeProducts\",\"products\",\"categories\"]"
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

url = 'http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227'
payload = {
    "filters": {
        "relations": "[\"compositeProducts\",\"products\",\"categories\"]"
    }
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, json=payload)
response.json()
```

```bash
curl -X GET \
    -G "http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"filters":{"relations":"[\"compositeProducts\",\"products\",\"categories\"]"}}'

```


> Example response (200):

```json
{
    "timestamp": 1617198794,
    "signature": "d4a7e1fbb778409ad158a5ed62904421",
    "content": {
        "success": true,
        "async": false,
        "body": {
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
    }
}
```
> Example response (200, Relations filter):

```json
{
    "timestamp": 1617198819,
    "signature": "5c95973065ea7f151ee3273f9f3876d7",
    "content": {
        "success": true,
        "async": false,
        "body": {
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
            "text": "promo d'été",
            "products": [
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
                }
            ],
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

### Request
<small class="badge badge-green">GET</small>
 **`discounts/{discount_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>discount_id</b></code>&nbsp;      <br>
    Discount ID

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>filters[relations]</b></code>&nbsp; <small>Add</small>         <i>optional</i>    <br>
    a relation in the response



## List all discounts


List all the discounts.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://dev-product.api.hopn.space/discounts',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'items_id'=> '["discount_9f71793f1bff89227","discount_d66672dd6b9052218"]',
            'limit'=> '10',
            'page'=> '1',
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
                'relations' => '["compositeProducts","products","categories"]',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/discounts"
);

let params = {
    "items_id": "["discount_9f71793f1bff89227","discount_d66672dd6b9052218"]",
    "limit": "10",
    "page": "1",
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
        "relations": "[\"compositeProducts\",\"products\",\"categories\"]"
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

url = 'http://dev-product.api.hopn.space/discounts'
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
        "relations": "[\"compositeProducts\",\"products\",\"categories\"]"
    }
}
params = {
  'items_id': '["discount_9f71793f1bff89227","discount_d66672dd6b9052218"]',
  'limit': '10',
  'page': '1',
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
    -G "http://dev-product.api.hopn.space/discounts?items_id=%5B%22discount_9f71793f1bff89227%22%2C%22discount_d66672dd6b9052218%22%5D&limit=10&page=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"filters":{"created":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"updated":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"deleted":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"relations":"[\"compositeProducts\",\"products\",\"categories\"]"}}'

```


> Example response (200):

```json
{
    "timestamp": 1617198706,
    "signature": "6bfe76d6fc8717cbf865e639e6cdb748",
    "content": {
        "success": true,
        "async": false,
        "pagination": {
            "current_page": 1,
            "last_page": 1,
            "per_page": 5,
            "total": 2,
            "next_page_url": null,
            "prev_page_url": null
        },
        "body": [
            {
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
        ]
    }
}
```
> Example response (200, Relations Filter):

```json
{
    "timestamp": 1617198737,
    "signature": "c04c2ba7a3e441391cef16f229838222",
    "content": {
        "success": true,
        "async": false,
        "pagination": {
            "current_page": 1,
            "last_page": 1,
            "per_page": 5,
            "total": 2,
            "next_page_url": null,
            "prev_page_url": null
        },
        "body": [
            {
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
                "text": "promo d'haloween",
                "products": [
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
                    }
                ],
                "composite_products": [],
                "categories": []
            },
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
                "text": "promo d'été",
                "products": [
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
                    }
                ],
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

### Request
<small class="badge badge-green">GET</small>
 **`discounts`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>items_id</b></code>&nbsp;          <i>optional</i>    <br>
    The items ID list to retrieve.

<code><b>limit</b></code>&nbsp;          <i>optional</i>    <br>
    Number of results per pagination page

<code><b>page</b></code>&nbsp;          <i>optional</i>    <br>
    Current page number for pagination

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



## Create a discount


Allows you to create a new discount.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://dev-product.api.hopn.space/discounts',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'title'=> 'Traduction française',
            'locale'=> 'fr-FR',
            'text'=> 'Promo d'halloween',
            'discount_type'=> 'percentage',
            'amount'=> '100',
            'start_at'=> '1970-01-01 00:00:00',
            'end_at'=> '1970-01-01 00:00:00',
            'promotional_code_id'=> 'promocode_17d78ae0a3bfb0a',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/discounts"
);

let params = {
    "title": "Traduction française",
    "locale": "fr-FR",
    "text": "Promo d'halloween",
    "discount_type": "percentage",
    "amount": "100",
    "start_at": "1970-01-01 00:00:00",
    "end_at": "1970-01-01 00:00:00",
    "promotional_code_id": "promocode_17d78ae0a3bfb0a",
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

url = 'http://dev-product.api.hopn.space/discounts'
params = {
  'title': 'Traduction française',
  'locale': 'fr-FR',
  'text': 'Promo d'halloween',
  'discount_type': 'percentage',
  'amount': '100',
  'start_at': '1970-01-01 00:00:00',
  'end_at': '1970-01-01 00:00:00',
  'promotional_code_id': 'promocode_17d78ae0a3bfb0a',
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
    "http://dev-product.api.hopn.space/discounts?title=Traduction+fran%C3%A7aise&locale=fr-FR&text=Promo+d%27halloween&discount_type=percentage&amount=100&start_at=1970-01-01+00%3A00%3A00&end_at=1970-01-01+00%3A00%3A00&promotional_code_id=promocode_17d78ae0a3bfb0a" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1617198958,
    "signature": "9ea7c4f4b0b0bc2d0f7b5c58c420762b",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "discount_a8a13219f62783d2",
            "discount_type": "pourcent",
            "amount": "50",
            "start_at": "2021-05-18 00:00:00",
            "end_at": "2021-06-18 00:00:00",
            "updated_at": "2021-03-31T13:55:58.000000Z",
            "created_at": "2021-03-31T13:55:58.000000Z",
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
            "title": "Traduction française",
            "text": "Promo d'hiver"
        }
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`discounts`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>title</b></code>&nbsp;      <br>
    Title of the description

<code><b>locale</b></code>&nbsp;      <br>
    Locale

<code><b>text</b></code>&nbsp;      <br>
    Description

<code><b>discount_type</b></code>&nbsp;      <br>
    Discount Type

<code><b>amount</b></code>&nbsp;      <br>
    amount

<code><b>start_at</b></code>&nbsp;      <br>
    Start

<code><b>end_at</b></code>&nbsp;      <br>
    End

<code><b>promotional_code_id</b></code>&nbsp;      <br>
    Promotional code ID



## Update a discount


You can update discount data.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'discount_type'=> 'percentage',
            'amount'=> '100',
            'start_at'=> '1970-01-01 00:00:00',
            'end_at'=> '1970-01-01 00:00:00',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227"
);

let params = {
    "discount_type": "percentage",
    "amount": "100",
    "start_at": "1970-01-01 00:00:00",
    "end_at": "1970-01-01 00:00:00",
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

url = 'http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227'
params = {
  'discount_type': 'percentage',
  'amount': '100',
  'start_at': '1970-01-01 00:00:00',
  'end_at': '1970-01-01 00:00:00',
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
    "http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227?discount_type=percentage&amount=100&start_at=1970-01-01+00%3A00%3A00&end_at=1970-01-01+00%3A00%3A00" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1617199872,
    "signature": "600d71b9e27b753963ab14f68d9a4d3f",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "discount_a8a13219f62783d2",
            "discount_type": "EUR",
            "amount": "50",
            "start_at": "2021-05-18 00:00:00",
            "end_at": "2021-06-18 00:00:00",
            "deleted_at": null,
            "created_at": "2021-03-31T13:55:58.000000Z",
            "updated_at": "2021-03-31T14:11:12.000000Z",
            "promotional_code": {
                "id": "promocode_17d78ae0a3bfb0a",
                "code": "PROMO10",
                "number_used": 0,
                "maximum_usage": 1,
                "combinable_with_offers": false,
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "title": "English Translations",
                "text": "Promo code 10%"
            },
            "title": "Traduction française",
            "text": "Promo d'hiver"
        }
    }
}
```

### Request
<small class="badge badge-purple">PATCH</small>
 **`discounts/{discount_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>discount_id</b></code>&nbsp;      <br>
    Id of the discount to update

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>discount_type</b></code>&nbsp;      <br>
    Discount Type

<code><b>amount</b></code>&nbsp;      <br>
    amount

<code><b>start_at</b></code>&nbsp;      <br>
    Start

<code><b>end_at</b></code>&nbsp;      <br>
    End



## Delete a discount


Delete a discount and anonymize the data.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227',
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
    "http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227"
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

url = 'http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers)
response.json()
```

```bash
curl -X DELETE \
    "http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1617199911,
    "signature": "0a82f341c46b8b7fe421b2a0c69597c4",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "discount_a8a13219f62783d2",
            "discount_type": "EUR",
            "amount": 50,
            "start_at": "2021-05-18 00:00:00",
            "end_at": "2021-06-18 00:00:00",
            "deleted_at": "2021-03-31T14:11:51.000000Z",
            "created_at": "2021-03-31T13:55:58.000000Z",
            "updated_at": "2021-03-31T14:11:51.000000Z",
            "promotional_code": {
                "id": "promocode_17d78ae0a3bfb0a",
                "code": "PROMO10",
                "number_used": 0,
                "maximum_usage": 1,
                "combinable_with_offers": false,
                "deleted_at": null,
                "created_at": "2021-03-29T09:31:00.000000Z",
                "updated_at": "2021-03-29T09:31:00.000000Z",
                "title": "English Translations",
                "text": "Promo code 10%"
            },
            "title": null,
            "text": null
        }
    }
}
```

### Request
<small class="badge badge-red">DELETE</small>
 **`discounts/{discount_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>discount_id</b></code>&nbsp;      <br>
    Discount ID



## Translate a discount&#039;s description


Allow you to translate a discount's description

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227/translate',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'locale'=> 'en-US',
            'title'=> 'English translations',
            'text'=> 'winter sales',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227/translate"
);

let params = {
    "locale": "en-US",
    "title": "English translations",
    "text": "winter sales",
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

url = 'http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227/translate'
params = {
  'locale': 'en-US',
  'title': 'English translations',
  'text': 'winter sales',
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
    "http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227/translate?locale=en-US&title=English+translations&text=winter+sales" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615933267,
    "signature": "286a088044c8fb466707b2487795bbfa",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "discounttrad_19e863dfddd6",
            "discount_id": "discount_93c6eb6a9e05c06e",
            "locale": "en-US",
            "title": "English translation",
            "text": "Winter sales",
            "deleted_at": null,
            "created_at": "2021-03-16T22:21:07.000000Z",
            "updated_at": "2021-03-16T22:21:07.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`discounts/{discount_id}/translate`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>discount_id</b></code>&nbsp;      <br>
    Discount ID

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>locale</b></code>&nbsp;      <br>
    Locale

<code><b>title</b></code>&nbsp;      <br>
    The title of the translation

<code><b>text</b></code>&nbsp;      <br>
    The description of the discount translated



## Remove a discount&#039;s description translation


Allow you to remove a discount's description translation.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227/translate',
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
    "http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227/translate"
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

url = 'http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227/translate'
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
    "http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227/translate?locale=en-US" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615933306,
    "signature": "2edf4bc012a3516835b3057e8a094cd6",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "discounttrad_19e863dfddd6",
            "discount_id": "discount_93c6eb6a9e05c06e",
            "locale": "en-US",
            "title": "English translation",
            "text": "Winter sales",
            "deleted_at": "2021-03-16T22:21:46.000000Z",
            "created_at": "2021-03-16T22:21:07.000000Z",
            "updated_at": "2021-03-16T22:21:46.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-red">DELETE</small>
 **`discounts/{discount_id}/translate`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>discount_id</b></code>&nbsp;      <br>
    Discount ID

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>locale</b></code>&nbsp;      <br>
    Locale



## assign a discount to a product, composite product or category


You can assign a discount.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227/assign',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'product_id'=> 'prod_3a3d84897c39a40bc49e',
            'composite_product_id'=> 'prodc_05ba52372e3c09a8219',
            'category_id'=> 'cat_bcc3b36c2dd0ae4a1c57c',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227/assign"
);

let params = {
    "product_id": "prod_3a3d84897c39a40bc49e",
    "composite_product_id": "prodc_05ba52372e3c09a8219",
    "category_id": "cat_bcc3b36c2dd0ae4a1c57c",
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

url = 'http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227/assign'
params = {
  'product_id': 'prod_3a3d84897c39a40bc49e',
  'composite_product_id': 'prodc_05ba52372e3c09a8219',
  'category_id': 'cat_bcc3b36c2dd0ae4a1c57c',
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
    "http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227/assign?product_id=prod_3a3d84897c39a40bc49e&composite_product_id=prodc_05ba52372e3c09a8219&category_id=cat_bcc3b36c2dd0ae4a1c57c" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1616155703,
    "signature": "d3ec0dc0e198a39f06a513ff667b0fa8",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "product": {
                "id": "proddiscount_5471a5a2027d",
                "discount_id": "discount_fffbae84a65baa0a",
                "product_id": "prod_3a3d84897c39a40bc49e",
                "updated_at": "2021-03-19T12:08:23.000000Z",
                "created_at": "2021-03-19T12:08:23.000000Z"
            },
            "composite_product": {
                "id": "prodcdiscount_45d4e653b70",
                "composite_product_id": "prodc_05ba52372e3c09a8219",
                "discount_id": "discount_fffbae84a65baa0a",
                "updated_at": "2021-03-19T12:08:23.000000Z",
                "created_at": "2021-03-19T12:08:23.000000Z"
            },
            "category": {
                "id": "catdiscount_3de9328674a97",
                "discount_id": "discount_fffbae84a65baa0a",
                "category_id": "cat_bcc3b36c2dd0ae4a1c57c",
                "updated_at": "2021-03-19T12:08:23.000000Z",
                "created_at": "2021-03-19T12:08:23.000000Z"
            }
        }
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`discounts/{discount_id}/assign`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>discount_id</b></code>&nbsp;      <br>
    Id of the discount to assign

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>product_id</b></code>&nbsp;      <br>
    Product ID

<code><b>composite_product_id</b></code>&nbsp;      <br>
    Composite Product ID

<code><b>category_id</b></code>&nbsp;      <br>
    Category ID



## remove a discount to a product, composite product or category


You can remove a discount.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227/remove',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'product_id'=> 'prod_3a3d84897c39a40bc49e',
            'composite_product_id'=> 'prodc_05ba52372e3c09a8219',
            'category_id'=> 'cat_bcc3b36c2dd0ae4a1c57c',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227/remove"
);

let params = {
    "product_id": "prod_3a3d84897c39a40bc49e",
    "composite_product_id": "prodc_05ba52372e3c09a8219",
    "category_id": "cat_bcc3b36c2dd0ae4a1c57c",
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

url = 'http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227/remove'
params = {
  'product_id': 'prod_3a3d84897c39a40bc49e',
  'composite_product_id': 'prodc_05ba52372e3c09a8219',
  'category_id': 'cat_bcc3b36c2dd0ae4a1c57c',
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
    "http://dev-product.api.hopn.space/discounts/discount_9f71793f1bff89227/remove?product_id=prod_3a3d84897c39a40bc49e&composite_product_id=prodc_05ba52372e3c09a8219&category_id=cat_bcc3b36c2dd0ae4a1c57c" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1616155756,
    "signature": "1055f4e9269d469e30ea887df31a4777",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "product": {
                "id": "productdiscount_7c362234c",
                "product_id": "prod_3a3d84897c39a40bc49e",
                "discount_id": "discount_fffbae84a65baa0a",
                "deleted_at": "2021-03-19T12:09:16.000000Z",
                "created_at": "2021-03-19T12:07:33.000000Z",
                "updated_at": "2021-03-19T12:09:16.000000Z"
            },
            "composite_product": {
                "id": "cpdiscount_a109fe33b55ca3",
                "composite_product_id": "prodc_05ba52372e3c09a8219",
                "discount_id": "discount_fffbae84a65baa0a",
                "deleted_at": "2021-03-19T12:09:16.000000Z",
                "created_at": "2021-03-19T12:07:33.000000Z",
                "updated_at": "2021-03-19T12:09:16.000000Z"
            },
            "category": {
                "id": "catdiscount_b550eef6ce6ed",
                "category_id": "cat_bcc3b36c2dd0ae4a1c57c",
                "discount_id": "discount_fffbae84a65baa0a",
                "deleted_at": "2021-03-19T12:09:16.000000Z",
                "created_at": "2021-03-19T12:07:33.000000Z",
                "updated_at": "2021-03-19T12:09:16.000000Z"
            }
        }
    }
}
```

### Request
<small class="badge badge-red">DELETE</small>
 **`discounts/{discount_id}/remove`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>discount_id</b></code>&nbsp;      <br>
    Id of the discount to assign

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>product_id</b></code>&nbsp;      <br>
    Product ID

<code><b>composite_product_id</b></code>&nbsp;      <br>
    Composite Product ID

<code><b>category_id</b></code>&nbsp;      <br>
    Category ID




