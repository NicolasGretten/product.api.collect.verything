# Products


## Retrieve a product


Retrieve all product details.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://dev-product.api.hopn.space/products/product_9f71793f1bff89227',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'filters' => [
                'relations' => '["compositeProducts","availabilities","prices","discounts","categories","translationsList"]',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/products/product_9f71793f1bff89227"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "filters": {
        "relations": "[\"compositeProducts\",\"availabilities\",\"prices\",\"discounts\",\"categories\",\"translationsList\"]"
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

url = 'http://dev-product.api.hopn.space/products/product_9f71793f1bff89227'
payload = {
    "filters": {
        "relations": "[\"compositeProducts\",\"availabilities\",\"prices\",\"discounts\",\"categories\",\"translationsList\"]"
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
    -G "http://dev-product.api.hopn.space/products/product_9f71793f1bff89227" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"filters":{"relations":"[\"compositeProducts\",\"availabilities\",\"prices\",\"discounts\",\"categories\",\"translationsList\"]"}}'

```


> Example response (200):

```json
{
    "timestamp": 1615908831,
    "signature": "7cc9d6d99f6dec53b882acf672d61bb4",
    "content": {
        "success": true,
        "async": false,
        "body": [
            {
                "id": "product_9f71793f1bff89227",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "Croissant"
            }
        ]
    }
}
```
> Example response (200, Relations filter):

```json
{
    "timestamp": 1615908853,
    "signature": "e409f3b23aa91b9fcbd6c6a47f05f2aa",
    "content": {
        "success": true,
        "async": false,
        "body": [
            {
                "id": "product_9f71793f1bff89227",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "Croissant",
                "composite_products": [
                    {
                        "id": "compproduct_64ba1e4ff721a",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "petit déjeuner"
                    }
                ],
                "availabilities": [
                    {
                        "id": "pa_180d3dbb58a29ee43ce94d",
                        "product_id": "product_9f71793f1bff89227",
                        "day": "monday",
                        "hour_start": "07:00:00",
                        "hour_end": "11:00:00",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ],
                "prices": [
                    {
                        "id": "productprc_acda55e7a9ded8",
                        "product_id": "product_9f71793f1bff89227",
                        "price_including_taxes": 110,
                        "price_excluding_taxes": 100,
                        "vat_value": 10,
                        "vat_rate": 10,
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ],
                "discounts": [],
                "categories": [
                    {
                        "id": "cat_d10be1a57a0fddafc85b5",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "nourriture"
                    }
                ],
                "translations_list": [
                    {
                        "id": "producttrad139c02ff5af76c",
                        "product_id": "product_9f71793f1bff89227",
                        "locale": "fr-FR",
                        "title": "Traduction en français",
                        "text": "Croissant",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    },
                    {
                        "id": "producttrad89fdec624b250d",
                        "product_id": "product_9f71793f1bff89227",
                        "locale": "en-US",
                        "title": "English Translations",
                        "text": "Croissant",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ]
            }
        ]
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`products/{product_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>product_id</b></code>&nbsp;      <br>
    Product ID

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
            'items_id'=> '["product_9f71793f1bff89227","product_d66672dd6b9052218"]',
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
                'relations' => '["compositeProducts","availabilities","prices","discounts","categories","translationsList"]',
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
    "items_id": "["product_9f71793f1bff89227","product_d66672dd6b9052218"]",
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
        "relations": "[\"compositeProducts\",\"availabilities\",\"prices\",\"discounts\",\"categories\",\"translationsList\"]"
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
        "relations": "[\"compositeProducts\",\"availabilities\",\"prices\",\"discounts\",\"categories\",\"translationsList\"]"
    }
}
params = {
  'items_id': '["product_9f71793f1bff89227","product_d66672dd6b9052218"]',
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
    -G "http://dev-product.api.hopn.space/products?items_id=%5B%22product_9f71793f1bff89227%22%2C%22product_d66672dd6b9052218%22%5D&limit=10&page=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"filters":{"created":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"updated":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"deleted":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"relations":"[\"compositeProducts\",\"availabilities\",\"prices\",\"discounts\",\"categories\",\"translationsList\"]"}}'

```


> Example response (200):

```json
{
    "timestamp": 1615908317,
    "signature": "ac714b7c9aaee00aebf6790e4fe5138b",
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
                "id": "product_9f71793f1bff89227",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "Croissant"
            },
            {
                "id": "product_d66672dd6b9052218",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "Salade"
            },
            {
                "id": "product_3888c3b144ccdc59c",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "Mimosa"
            },
            {
                "id": "product_8a72e4d0f1fd12d03",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "café"
            },
            {
                "id": "product_4c053842dc07c0330",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
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
    "timestamp": 1615908746,
    "signature": "42d232d0e16180588f2d647f9ffd831a",
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
                "id": "product_9f71793f1bff89227",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "Croissant",
                "composite_products": [
                    {
                        "id": "compproduct_64ba1e4ff721a",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "petit déjeuner"
                    }
                ],
                "availabilities": [
                    {
                        "id": "pa_180d3dbb58a29ee43ce94d",
                        "product_id": "product_9f71793f1bff89227",
                        "day": "monday",
                        "hour_start": "07:00:00",
                        "hour_end": "11:00:00",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ],
                "prices": [
                    {
                        "id": "productprc_acda55e7a9ded8",
                        "product_id": "product_9f71793f1bff89227",
                        "price_including_taxes": 110,
                        "price_excluding_taxes": 100,
                        "vat_value": 10,
                        "vat_rate": 10,
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ],
                "discounts": [],
                "categories": [
                    {
                        "id": "cat_d10be1a57a0fddafc85b5",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "nourriture"
                    }
                ],
                "translations_list": [
                    {
                        "id": "producttrad139c02ff5af76c",
                        "product_id": "product_9f71793f1bff89227",
                        "locale": "fr-FR",
                        "title": "Traduction en français",
                        "text": "Croissant",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    },
                    {
                        "id": "producttrad89fdec624b250d",
                        "product_id": "product_9f71793f1bff89227",
                        "locale": "en-US",
                        "title": "English Translations",
                        "text": "Croissant",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ]
            },
            {
                "id": "product_d66672dd6b9052218",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "Salade",
                "composite_products": [
                    {
                        "id": "compproduct_c0b5eb2d85401",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "déjeuner"
                    }
                ],
                "availabilities": [
                    {
                        "id": "pa_b4f5b22bb71f6008a1b778",
                        "product_id": "product_d66672dd6b9052218",
                        "day": "monday",
                        "hour_start": "11:30:00",
                        "hour_end": "13:30:00",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ],
                "prices": [
                    {
                        "id": "productprc_1f5d304f55e4c7",
                        "product_id": "product_d66672dd6b9052218",
                        "price_including_taxes": 550,
                        "price_excluding_taxes": 500,
                        "vat_value": 50,
                        "vat_rate": 10,
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ],
                "discounts": [],
                "categories": [
                    {
                        "id": "cat_d10be1a57a0fddafc85b5",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "nourriture"
                    }
                ],
                "translations_list": [
                    {
                        "id": "producttrad0475fe55673a46",
                        "product_id": "product_d66672dd6b9052218",
                        "locale": "fr-FR",
                        "title": "Traduction en français",
                        "text": "Salade",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    },
                    {
                        "id": "producttrad8072122e9c936c",
                        "product_id": "product_d66672dd6b9052218",
                        "locale": "en-US",
                        "title": "English Translations",
                        "text": "Salad",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ]
            },
            {
                "id": "product_3888c3b144ccdc59c",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "Mimosa",
                "composite_products": [],
                "availabilities": [
                    {
                        "id": "pa_02d1fe6232ff5b9bf62e42",
                        "product_id": "product_3888c3b144ccdc59c",
                        "day": "monday",
                        "hour_start": "10:30:00",
                        "hour_end": "14:30:00",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ],
                "prices": [
                    {
                        "id": "productprc_514b590943e32d",
                        "product_id": "product_3888c3b144ccdc59c",
                        "price_including_taxes": 660,
                        "price_excluding_taxes": 600,
                        "vat_value": 60,
                        "vat_rate": 10,
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ],
                "discounts": [],
                "categories": [
                    {
                        "id": "cat_1ddf322d0c198c29b50ce",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "Boisson"
                    }
                ],
                "translations_list": [
                    {
                        "id": "producttrad42d723fbbdeb74",
                        "product_id": "product_3888c3b144ccdc59c",
                        "locale": "fr-FR",
                        "title": "Traduction en français",
                        "text": "Mimosa",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    },
                    {
                        "id": "producttrada2a862229d89fd",
                        "product_id": "product_3888c3b144ccdc59c",
                        "locale": "en-US",
                        "title": "English Translations",
                        "text": "Mimosa",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ]
            },
            {
                "id": "product_8a72e4d0f1fd12d03",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "café",
                "composite_products": [
                    {
                        "id": "compproduct_64ba1e4ff721a",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "petit déjeuner"
                    }
                ],
                "availabilities": [
                    {
                        "id": "pa_0535b1fd8aaf67f5c7749b",
                        "product_id": "product_8a72e4d0f1fd12d03",
                        "day": "monday",
                        "hour_start": "08:00:00",
                        "hour_end": "18:00:00",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ],
                "prices": [
                    {
                        "id": "productprc_71bac653104046",
                        "product_id": "product_8a72e4d0f1fd12d03",
                        "price_including_taxes": 110,
                        "price_excluding_taxes": 100,
                        "vat_value": 10,
                        "vat_rate": 10,
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ],
                "discounts": [],
                "categories": [
                    {
                        "id": "cat_1ddf322d0c198c29b50ce",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "Boisson"
                    }
                ],
                "translations_list": [
                    {
                        "id": "producttrada11f934b82dd3f",
                        "product_id": "product_8a72e4d0f1fd12d03",
                        "locale": "fr-FR",
                        "title": "Traduction en français",
                        "text": "café",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    },
                    {
                        "id": "producttrad82d4038d393aac",
                        "product_id": "product_8a72e4d0f1fd12d03",
                        "locale": "en-US",
                        "title": "English Translations",
                        "text": "coffee",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ]
            },
            {
                "id": "product_4c053842dc07c0330",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "apéritif",
                "composite_products": [
                    {
                        "id": "compproduct_c0b5eb2d85401",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "déjeuner"
                    }
                ],
                "availabilities": [
                    {
                        "id": "pa_fb3d8e12d5706b18552cb3",
                        "product_id": "product_4c053842dc07c0330",
                        "day": "monday",
                        "hour_start": "18:00:00",
                        "hour_end": "23:30:00",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ],
                "prices": [
                    {
                        "id": "productprc_7de206e17915d8",
                        "product_id": "product_4c053842dc07c0330",
                        "price_including_taxes": 880,
                        "price_excluding_taxes": 800,
                        "vat_value": 80,
                        "vat_rate": 10,
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ],
                "discounts": [],
                "categories": [
                    {
                        "id": "cat_1ddf322d0c198c29b50ce",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "Boisson"
                    }
                ],
                "translations_list": [
                    {
                        "id": "producttradbd6c67d9f934be",
                        "product_id": "product_4c053842dc07c0330",
                        "locale": "fr-FR",
                        "title": "Traduction en français",
                        "text": "apéritif",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    },
                    {
                        "id": "producttrad8581d12907e5c3",
                        "product_id": "product_4c053842dc07c0330",
                        "locale": "en-US",
                        "title": "English Translations",
                        "text": "aperitif",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ]
            }
        ]
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`products`**

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
    "timestamp": 1615911017,
    "signature": "9896d92ef3a013e90bb01cec2ed4085a",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "product_52e47d49bc151e311",
            "updated_at": "2021-03-16T16:10:17.000000Z",
            "created_at": "2021-03-16T16:10:17.000000Z",
            "title": "Traduction française",
            "text": "spa"
        }
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`products`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>title</b></code>&nbsp;      <br>
    Title of the description

<code><b>locale</b></code>&nbsp;      <br>
    Locale

<code><b>text</b></code>&nbsp;      <br>
    Description

<code><b>price_including_taxes</b></code>&nbsp;          <i>optional</i>    <br>
    New price including taxes

<code><b>price_excluding_taxes</b></code>&nbsp;          <i>optional</i>    <br>
    New price excluding taxes

<code><b>vat_value</b></code>&nbsp;          <i>optional</i>    <br>
    New vat value

<code><b>vat_rate</b></code>&nbsp;          <i>optional</i>    <br>
    New vat rate

<code><b>day</b></code>&nbsp;      <br>
    day available

<code><b>hour_start</b></code>&nbsp;      <br>
    Hour start

<code><b>hour_end</b></code>&nbsp;      <br>
    Hour end

<code><b>category_id</b></code>&nbsp;      <br>
    Category ID



## Delete a product


Delete a product and anonymize the data.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://dev-product.api.hopn.space/products/product_9f71793f1bff89227',
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
    "http://dev-product.api.hopn.space/products/product_9f71793f1bff89227"
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

url = 'http://dev-product.api.hopn.space/products/product_9f71793f1bff89227'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers)
response.json()
```

```bash
curl -X DELETE \
    "http://dev-product.api.hopn.space/products/product_9f71793f1bff89227" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615911966,
    "signature": "3114fed1bd4b4811c02d025ad7dc01cc",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "product_71886fceae499c2d6",
            "deleted_at": "2021-03-16T16:26:06.000000Z",
            "created_at": "2021-03-16T16:25:07.000000Z",
            "updated_at": "2021-03-16T16:26:06.000000Z",
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
<code><b>product_id</b></code>&nbsp;      <br>
    Product ID



## Translate a product&#039;s description


Allow you to translate a product's description

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/translate',
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
    "http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/translate"
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

url = 'http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/translate'
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
    "http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/translate?locale=en-US&title=English+translations&text=Spa" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615912024,
    "signature": "6f072bb30a20c2c394201ff1ff059c6e",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "producttrad8072122e9c936c",
            "product_id": "product_a4f8990000bd4b978",
            "locale": "en-US",
            "title": "English translation",
            "text": "Pool access",
            "deleted_at": null,
            "created_at": "2021-03-16T16:27:04.000000Z",
            "updated_at": "2021-03-16T16:27:04.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`products/{product_id}/translate`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>product_id</b></code>&nbsp;      <br>
    Product ID

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>locale</b></code>&nbsp;      <br>
    Locale

<code><b>title</b></code>&nbsp;      <br>
    The title of the translation

<code><b>text</b></code>&nbsp;      <br>
    The description of the product translated



## Remove a product&#039;s description translation


Allow you to remove a product's description translation.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/translate',
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
    "http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/translate"
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

url = 'http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/translate'
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
    "http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/translate?locale=en-US" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615912106,
    "signature": "077eb15ee042f3227be91fb2a3f39ae0",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "cattrad_261e027b010fbad50",
            "product_id": "product_a4f8990000bd4b978",
            "locale": "en-US",
            "title": "English translation",
            "text": "Pool access",
            "deleted_at": "2021-03-16T16:28:26.000000Z",
            "created_at": "2021-03-16T16:27:04.000000Z",
            "updated_at": "2021-03-16T16:28:26.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-red">DELETE</small>
 **`products/{product_id}/translate`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>product_id</b></code>&nbsp;      <br>
    Product ID

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>locale</b></code>&nbsp;      <br>
    Locale



## Update a product price


You can update product price data.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/price',
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
    "http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/price"
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

url = 'http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/price'
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
    "http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/price?price_including_taxes=120&price_excluding_taxes=100&vat_value=20&vat_rate=20" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615924650,
    "signature": "8a862dbe9a5961e2ddc7e26759259514",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "cpprice_2168ca21f9c50723b",
            "composite_product_id": "compproduct_f69ab775ee415",
            "price_including_taxes": "1200",
            "price_excluding_taxes": "1000",
            "vat_value": "200",
            "vat_rate": "20",
            "deleted_at": null,
            "created_at": "2021-03-16T19:55:50.000000Z",
            "updated_at": "2021-03-16T19:57:30.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-purple">PATCH</small>
 **`products/{product_id}/price`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>product_id</b></code>&nbsp;      <br>
    Id of the product to update

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>price_including_taxes</b></code>&nbsp;          <i>optional</i>    <br>
    New price including taxes

<code><b>price_excluding_taxes</b></code>&nbsp;          <i>optional</i>    <br>
    New price excluding taxes

<code><b>vat_value</b></code>&nbsp;          <i>optional</i>    <br>
    New vat value

<code><b>vat_rate</b></code>&nbsp;          <i>optional</i>    <br>
    New vat rate



## Update a product availabilities


You can update product availabilities data.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/availability',
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
    "http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/availability"
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

url = 'http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/availability'
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
    "http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/availability?day=%5B%22monday%22%2C%22tuesday%22%2C%22wednesday%22%5D&hour_start=08%3A00%3A00&hour_end=10%3A00%3A00" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615924708,
    "signature": "3ce0e3ceeb9dcbfc07f07e95b1618590",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "cpa_9dd4932a9e5f703520a17",
            "composite_product_id": "compproduct_f69ab775ee415",
            "day": "[\"monday\",\"tuesday\",\"wednesday\"]",
            "hour_start": "08:00:00",
            "hour_end": "18:00:00",
            "deleted_at": null,
            "created_at": "2021-03-16T19:55:50.000000Z",
            "updated_at": "2021-03-16T19:58:28.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-purple">PATCH</small>
 **`products/{product_id}/availability`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>product_id</b></code>&nbsp;      <br>
    Id of the product to update

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>day</b></code>&nbsp;      <br>
    day available

<code><b>hour_start</b></code>&nbsp;      <br>
    Hour start

<code><b>hour_end</b></code>&nbsp;      <br>
    Hour end



## Update a product category


You can update product category data.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/category',
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
    "http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/category"
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

url = 'http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/category'
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
    "http://dev-product.api.hopn.space/products/product_9f71793f1bff89227/category?category_id=cat_d10be1a57a0fddafc85b5" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615924763,
    "signature": "c2f6f7f4e0cca1e74168929324d7fcc7",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "cpcat_e651cad0babb7718975",
            "composite_product_id": "compproduct_f69ab775ee415",
            "category_id": "cat_bcc3b36c2dd0ae4a1c57c",
            "deleted_at": null,
            "created_at": "2021-03-16T19:55:50.000000Z",
            "updated_at": "2021-03-16T19:59:23.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-purple">PATCH</small>
 **`products/{product_id}/category`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>product_id</b></code>&nbsp;      <br>
    Id of the product to update

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>category_id</b></code>&nbsp;      <br>
    Category ID




