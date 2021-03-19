# Composite Products


## Retrieve a product


Retrieve all product details.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'filters' => [
                'relations' => '["products","availabilities","prices","discounts","categories"]',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "filters": {
        "relations": "[\"products\",\"availabilities\",\"prices\",\"discounts\",\"categories\"]"
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

url = 'http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219'
payload = {
    "filters": {
        "relations": "[\"products\",\"availabilities\",\"prices\",\"discounts\",\"categories\"]"
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
    -G "http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"filters":{"relations":"[\"products\",\"availabilities\",\"prices\",\"discounts\",\"categories\"]"}}'

```


> Example response (200):

```json
{
    "timestamp": 1616094448,
    "signature": "89bb5a65399429164feb4dd73a1ed3ee",
    "content": {
        "success": true,
        "async": false,
        "body": [
            {
                "id": "prodc_05ba52372e3c09a8219",
                "deleted_at": null,
                "created_at": "2021-03-18T13:27:54.000000Z",
                "updated_at": "2021-03-18T13:27:54.000000Z",
                "title": "Traduction en français",
                "text": "petit déjeuner"
            }
        ]
    }
}
```
> Example response (200, Relations filter):

```json
{
    "timestamp": 1616159900,
    "signature": "a6ffb1fba0b8366c0b510ffd2cd84953",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodc_05ba52372e3c09a8219",
            "deleted_at": null,
            "created_at": "2021-03-19T13:07:40.000000Z",
            "updated_at": "2021-03-19T13:07:40.000000Z",
            "title": "Traduction en français",
            "text": "petit déjeuner",
            "products": [
                {
                    "id": "prod_3a3d84897c39a40bc49e",
                    "deleted_at": null,
                    "created_at": "2021-03-19T13:07:40.000000Z",
                    "updated_at": "2021-03-19T13:07:40.000000Z",
                    "title": "Traduction en français",
                    "text": "Croissant"
                },
                {
                    "id": "prod_c93e0a2194593f85a7a6",
                    "deleted_at": null,
                    "created_at": "2021-03-19T13:07:40.000000Z",
                    "updated_at": "2021-03-19T13:07:40.000000Z",
                    "title": "Traduction en français",
                    "text": "Salade"
                }
            ],
            "availabilities": [
                {
                    "id": "prodcavail_be543e130303d0",
                    "composite_product_id": "prodc_05ba52372e3c09a8219",
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
                    "created_at": "2021-03-19T13:07:40.000000Z",
                    "updated_at": "2021-03-19T13:07:40.000000Z"
                }
            ],
            "prices": [
                {
                    "id": "prodcprice_bf3c673a69a41e",
                    "composite_product_id": "prodc_05ba52372e3c09a8219",
                    "price_including_taxes": 660,
                    "price_excluding_taxes": 600,
                    "vat_value": 60,
                    "vat_rate": 10,
                    "deleted_at": null,
                    "created_at": "2021-03-19T13:07:40.000000Z",
                    "updated_at": "2021-03-19T13:07:40.000000Z"
                }
            ],
            "discounts": [],
            "categories": [
                {
                    "id": "cat_3a61a9ed91efe584ca27c",
                    "deleted_at": null,
                    "created_at": "2021-03-19T13:07:40.000000Z",
                    "updated_at": "2021-03-19T13:07:40.000000Z",
                    "title": "Traduction en français",
                    "text": "repas"
                }
            ]
        }
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`composite-products/{composite_product_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>composite_product_id</b></code>&nbsp;      <br>
    Composite Product ID

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>filters[relations]</b></code>&nbsp; <small>Add</small>         <i>optional</i>    <br>
    a relation in the response



## List all composite products


List all the composite products.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://dev-product.api.hopn.space/composite-products',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'items_id'=> '["prodc_05ba52372e3c09a8219","prodc_bb6bca80cb0ac3484fb"]',
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
                'relations' => '["products","availabilities","prices","discounts","categories"]',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/composite-products"
);

let params = {
    "items_id": "["prodc_05ba52372e3c09a8219","prodc_bb6bca80cb0ac3484fb"]",
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
        "relations": "[\"products\",\"availabilities\",\"prices\",\"discounts\",\"categories\"]"
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

url = 'http://dev-product.api.hopn.space/composite-products'
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
        "relations": "[\"products\",\"availabilities\",\"prices\",\"discounts\",\"categories\"]"
    }
}
params = {
  'items_id': '["prodc_05ba52372e3c09a8219","prodc_bb6bca80cb0ac3484fb"]',
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
    -G "http://dev-product.api.hopn.space/composite-products?items_id=%5B%22prodc_05ba52372e3c09a8219%22%2C%22prodc_bb6bca80cb0ac3484fb%22%5D&limit=10&page=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"filters":{"created":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"updated":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"deleted":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"relations":"[\"products\",\"availabilities\",\"prices\",\"discounts\",\"categories\"]"}}'

```


> Example response (200):

```json
{
    "timestamp": 1615922554,
    "signature": "0c85573c29c07de1d235ff3f3795cf7d",
    "content": {
        "success": true,
        "async": false,
        "pagination": {
            "current_page": 1,
            "last_page": 1,
            "per_page": 10,
            "total": 2,
            "next_page_url": null,
            "prev_page_url": null
        },
        "body": [
            {
                "id": "prodc_05ba52372e3c09a8219",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "petit déjeuner"
            },
            {
                "id": "prodc_bb6bca80cb0ac3484fb",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "déjeuner"
            }
        ]
    }
}
```
> Example response (200, Relations Filter):

```json
{
    "timestamp": 1616159875,
    "signature": "23e358a9fc9a7d86b32e3b8cf60c6983",
    "content": {
        "success": true,
        "async": false,
        "pagination": {
            "current_page": 1,
            "last_page": 1,
            "per_page": 10,
            "total": 2,
            "next_page_url": null,
            "prev_page_url": null
        },
        "body": [
            {
                "id": "prodc_05ba52372e3c09a8219",
                "deleted_at": null,
                "created_at": "2021-03-19T13:07:40.000000Z",
                "updated_at": "2021-03-19T13:07:40.000000Z",
                "title": "Traduction en français",
                "text": "petit déjeuner",
                "products": [
                    {
                        "id": "prod_3a3d84897c39a40bc49e",
                        "deleted_at": null,
                        "created_at": "2021-03-19T13:07:40.000000Z",
                        "updated_at": "2021-03-19T13:07:40.000000Z",
                        "title": "Traduction en français",
                        "text": "Croissant"
                    },
                    {
                        "id": "prod_c93e0a2194593f85a7a6",
                        "deleted_at": null,
                        "created_at": "2021-03-19T13:07:40.000000Z",
                        "updated_at": "2021-03-19T13:07:40.000000Z",
                        "title": "Traduction en français",
                        "text": "Salade"
                    }
                ],
                "availabilities": [
                    {
                        "id": "prodcavail_be543e130303d0",
                        "composite_product_id": "prodc_05ba52372e3c09a8219",
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
                        "created_at": "2021-03-19T13:07:40.000000Z",
                        "updated_at": "2021-03-19T13:07:40.000000Z"
                    }
                ],
                "prices": [
                    {
                        "id": "prodcprice_bf3c673a69a41e",
                        "composite_product_id": "prodc_05ba52372e3c09a8219",
                        "price_including_taxes": 660,
                        "price_excluding_taxes": 600,
                        "vat_value": 60,
                        "vat_rate": 10,
                        "deleted_at": null,
                        "created_at": "2021-03-19T13:07:40.000000Z",
                        "updated_at": "2021-03-19T13:07:40.000000Z"
                    }
                ],
                "discounts": [],
                "categories": [
                    {
                        "id": "cat_3a61a9ed91efe584ca27c",
                        "deleted_at": null,
                        "created_at": "2021-03-19T13:07:40.000000Z",
                        "updated_at": "2021-03-19T13:07:40.000000Z",
                        "title": "Traduction en français",
                        "text": "repas"
                    }
                ]
            },
            {
                "id": "prodc_bb6bca80cb0ac3484fb",
                "deleted_at": null,
                "created_at": "2021-03-19T13:07:40.000000Z",
                "updated_at": "2021-03-19T13:07:40.000000Z",
                "title": "Traduction en français",
                "text": "déjeuner",
                "products": [
                    {
                        "id": "prod_672832afc671d36c6213",
                        "deleted_at": null,
                        "created_at": "2021-03-19T13:07:40.000000Z",
                        "updated_at": "2021-03-19T13:07:40.000000Z",
                        "title": "Traduction en français",
                        "text": "Mimosa"
                    },
                    {
                        "id": "prod_1344f9b420f516b26861",
                        "deleted_at": null,
                        "created_at": "2021-03-19T13:07:40.000000Z",
                        "updated_at": "2021-03-19T13:07:40.000000Z",
                        "title": "Traduction en français",
                        "text": "café"
                    }
                ],
                "availabilities": [
                    {
                        "id": "prodcavail_3c9c65b9218a28",
                        "composite_product_id": "prodc_bb6bca80cb0ac3484fb",
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
                        "created_at": "2021-03-19T13:07:40.000000Z",
                        "updated_at": "2021-03-19T13:07:40.000000Z"
                    }
                ],
                "prices": [
                    {
                        "id": "prodcprice_ebae4c356d1e94",
                        "composite_product_id": "prodc_bb6bca80cb0ac3484fb",
                        "price_including_taxes": 1100,
                        "price_excluding_taxes": 1000,
                        "vat_value": 100,
                        "vat_rate": 10,
                        "deleted_at": null,
                        "created_at": "2021-03-19T13:07:40.000000Z",
                        "updated_at": "2021-03-19T13:07:40.000000Z"
                    }
                ],
                "discounts": [],
                "categories": [
                    {
                        "id": "cat_3a61a9ed91efe584ca27c",
                        "deleted_at": null,
                        "created_at": "2021-03-19T13:07:40.000000Z",
                        "updated_at": "2021-03-19T13:07:40.000000Z",
                        "title": "Traduction en français",
                        "text": "repas"
                    }
                ]
            }
        ]
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`composite-products`**

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
    'http://dev-product.api.hopn.space/composite-products',
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
    "http://dev-product.api.hopn.space/composite-products"
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

url = 'http://dev-product.api.hopn.space/composite-products'
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
    "http://dev-product.api.hopn.space/composite-products?title=Traduction+fran%C3%A7aise&locale=fr-FR&text=spa&price_including_taxes=120&price_excluding_taxes=100&vat_value=20&vat_rate=20&day=%5B%22monday%22%2C%22tuesday%22%2C%22wednesday%22%5D&hour_start=08%3A00%3A00&hour_end=10%3A00%3A00&category_id=cat_d10be1a57a0fddafc85b5" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1616094321,
    "signature": "221202a27628f3ec57c52d492cf9487a",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodc_1ea4c4b453b2490a6c9",
            "updated_at": "2021-03-18T19:05:21.000000Z",
            "created_at": "2021-03-18T19:05:21.000000Z",
            "availability": {
                "id": "prodcavail_6f901489e78f9f",
                "composite_product_id": "prodc_1ea4c4b453b2490a6c9",
                "days": [
                    "monday",
                    "tuesday",
                    "friday"
                ],
                "hour_start": "08:00:00",
                "hour_end": "18:00:00",
                "updated_at": "2021-03-18T19:05:21.000000Z",
                "created_at": "2021-03-18T19:05:21.000000Z"
            },
            "price": {
                "id": "prodcprice_f1141a356500d7",
                "composite_product_id": "prodc_1ea4c4b453b2490a6c9",
                "price_including_taxes": "110",
                "price_excluding_taxes": "100",
                "vat_value": "10",
                "vat_rate": "10",
                "updated_at": "2021-03-18T19:05:21.000000Z",
                "created_at": "2021-03-18T19:05:21.000000Z"
            },
            "category": {
                "id": "prodccat_d58b673c60162d0b",
                "composite_product_id": "prodc_1ea4c4b453b2490a6c9",
                "category_id": "cat_1ddf322d0c198c29b50ce",
                "updated_at": "2021-03-18T19:05:21.000000Z",
                "created_at": "2021-03-18T19:05:21.000000Z"
            },
            "title": "Traduction française",
            "text": "séminaire"
        }
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`composite-products`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>title</b></code>&nbsp;      <br>
    Title of the description

<code><b>locale</b></code>&nbsp;      <br>
    Locale

<code><b>text</b></code>&nbsp;      <br>
    Description

<code><b>price_including_taxes</b></code>&nbsp;      <br>
    New price including taxes

<code><b>price_excluding_taxes</b></code>&nbsp;      <br>
    New price excluding taxes

<code><b>vat_value</b></code>&nbsp;      <br>
    New vat value

<code><b>vat_rate</b></code>&nbsp;      <br>
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
    'http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219',
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
    "http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219"
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

url = 'http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers)
response.json()
```

```bash
curl -X DELETE \
    "http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615924909,
    "signature": "7a1746e4b64f8c9fc307cf729b934ad7",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodc_1ea4c4b453b2490a6c9",
            "deleted_at": "2021-03-16T20:01:49.000000Z",
            "created_at": "2021-03-15T15:21:54.000000Z",
            "updated_at": "2021-03-16T20:01:49.000000Z",
            "title": "Traduction en français",
            "text": "petit déjeuner"
        }
    }
}
```

### Request
<small class="badge badge-red">DELETE</small>
 **`composite-products/{composite_product_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>composite_product_id</b></code>&nbsp;      <br>
    Composite Product ID



## Translate a product&#039;s description


Allow you to translate a product's description

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/translate',
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
    "http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/translate"
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

url = 'http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/translate'
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
    "http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/translate?locale=en-US&title=English+translations&text=Spa" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615924826,
    "signature": "102d4f0e0c6455f824168362dd9024aa",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodctrad_ba9c77ec568381d",
            "composite_product_id": "prodc_f7cf076a4da1055a5a1",
            "locale": "en-US",
            "title": "English translation",
            "text": "Seminary",
            "deleted_at": null,
            "created_at": "2021-03-16T20:00:26.000000Z",
            "updated_at": "2021-03-16T20:00:26.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`composite-products/{composite_product_id}/translate`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>composite_product_id</b></code>&nbsp;      <br>
    Composite Product ID

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
    'http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/translate',
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
    "http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/translate"
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

url = 'http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/translate'
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
    "http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/translate?locale=en-US" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1616094432,
    "signature": "53d660ef070f99eae8c6fb0dfacb6832",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodctrad_ba9c77ec568381d",
            "composite_product_id": "prodc_05ba52372e3c09a8219",
            "locale": "en-US",
            "title": "English translation",
            "text": "breakfast",
            "deleted_at": "2021-03-18T19:07:12.000000Z",
            "created_at": "2021-03-18T19:00:57.000000Z",
            "updated_at": "2021-03-18T19:07:12.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-red">DELETE</small>
 **`composite-products/{composite_product_id}/translate`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>composite_product_id</b></code>&nbsp;      <br>
    Composite Product ID

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>locale</b></code>&nbsp;      <br>
    Locale



## Update a product price


You can update product price data.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/price/1',
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
    "http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/price/1"
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

url = 'http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/price/1'
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
    "http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/price/1?price_including_taxes=120&price_excluding_taxes=100&vat_value=20&vat_rate=20" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1616155473,
    "signature": "485c583db97d155ae6cd961987b96339",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodcprice_79d60102fd6d74",
            "composite_product_id": "prodc_05ba52372e3c09a8219",
            "price_including_taxes": "2400",
            "price_excluding_taxes": "2000",
            "vat_value": "400",
            "vat_rate": "20",
            "updated_at": "2021-03-19T12:04:33.000000Z",
            "created_at": "2021-03-19T12:04:33.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-purple">PATCH</small>
 **`composite-products/{composite_product_id}/price/{composite_product_price_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>composite_product_id</b></code>&nbsp;      <br>
    Id of the product to update

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>price_including_taxes</b></code>&nbsp;      <br>
    New price including taxes

<code><b>price_excluding_taxes</b></code>&nbsp;      <br>
    New price excluding taxes

<code><b>vat_value</b></code>&nbsp;      <br>
    New vat value

<code><b>vat_rate</b></code>&nbsp;      <br>
    New vat rate



## Update a product availabilities


You can update product availabilities data.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/availability',
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
    "http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/availability"
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

url = 'http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/availability'
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
    "http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/availability?day=%5B%22monday%22%2C%22tuesday%22%2C%22wednesday%22%5D&hour_start=08%3A00%3A00&hour_end=10%3A00%3A00" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1616160080,
    "signature": "79216bc25997b150699479ead7ad3ad9",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodcavail_be543e130303d0",
            "composite_product_id": "prodc_05ba52372e3c09a8219",
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
            "created_at": "2021-03-19T13:07:40.000000Z",
            "updated_at": "2021-03-19T13:21:20.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-purple">PATCH</small>
 **`composite-products/{composite_product_id}/availability`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>composite_product_id</b></code>&nbsp;      <br>
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
    'http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/category',
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
    "http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/category"
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

url = 'http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/category'
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
    "http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/category?category_id=cat_d10be1a57a0fddafc85b5" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1616155446,
    "signature": "d4092d668f6271713404e9367c900773",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodccat_7c029f6bb9a2ebd2",
            "composite_product_id": "prodc_05ba52372e3c09a8219",
            "category_id": "cat_bcc3b36c2dd0ae4a1c57c",
            "deleted_at": null,
            "created_at": "2021-03-19T10:33:44.000000Z",
            "updated_at": "2021-03-19T12:04:06.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-purple">PATCH</small>
 **`composite-products/{composite_product_id}/category`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>composite_product_id</b></code>&nbsp;      <br>
    Id of the product to update

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>category_id</b></code>&nbsp;      <br>
    Category ID



## add a product to a composite product


You can add a product to a composite product.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/product',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'product_id'=> 'prod_3a3d84897c39a40bc49e',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/product"
);

let params = {
    "product_id": "prod_3a3d84897c39a40bc49e",
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

url = 'http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/product'
params = {
  'product_id': 'prod_3a3d84897c39a40bc49e',
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
    "http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/product?product_id=prod_3a3d84897c39a40bc49e" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615926839,
    "signature": "7fc0469a2c14674b9ea25415c3a33a18",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodcprod_74ec7b2d989035b",
            "composite_product_id": "prodc_f7cf076a4da1055a5a1",
            "product_id": "prod_3a3d84897c39a40bc49e",
            "updated_at": "2021-03-16T20:33:59.000000Z",
            "created_at": "2021-03-16T20:33:59.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`composite-products/{composite_product_id}/product`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>composite_product_id</b></code>&nbsp;      <br>
    Id of the product to update

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>product_id</b></code>&nbsp;      <br>
    Product ID



## remove a product from composite product


You can remove a product from composite product.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/product',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'product_id'=> 'prod_3a3d84897c39a40bc49e',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/product"
);

let params = {
    "product_id": "prod_3a3d84897c39a40bc49e",
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

url = 'http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/product'
params = {
  'product_id': 'prod_3a3d84897c39a40bc49e',
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
    "http://dev-product.api.hopn.space/composite-products/prodc_05ba52372e3c09a8219/product?product_id=prod_3a3d84897c39a40bc49e" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615926888,
    "signature": "718501965b9e91619669690aaee12a13",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodcprod_74ec7b2d989035b",
            "composite_product_id": "prodc_f7cf076a4da1055a5a1",
            "product_id": "product_9f71793f1bff89227",
            "deleted_at": "2021-03-16T20:34:48.000000Z",
            "created_at": "2021-03-16T20:33:59.000000Z",
            "updated_at": "2021-03-16T20:34:48.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-red">DELETE</small>
 **`composite-products/{composite_product_id}/product`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>composite_product_id</b></code>&nbsp;      <br>
    Id of the product to update

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>product_id</b></code>&nbsp;      <br>
    Product ID




