# Composite Products


## Retrieve a product


Retrieve all product details.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'filters' => [
                'relations' => '["products","availabilities","prices","discounts","categories","translationsList"]',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "filters": {
        "relations": "[\"products\",\"availabilities\",\"prices\",\"discounts\",\"categories\",\"translationsList\"]"
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

url = 'http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a'
payload = {
    "filters": {
        "relations": "[\"products\",\"availabilities\",\"prices\",\"discounts\",\"categories\",\"translationsList\"]"
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
    -G "http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"filters":{"relations":"[\"products\",\"availabilities\",\"prices\",\"discounts\",\"categories\",\"translationsList\"]"}}'

```


> Example response (200):

```json
{
    "timestamp": 1615923641,
    "signature": "0e9e7a88527a4ddf65f25ea3616fe2ee",
    "content": {
        "success": true,
        "async": false,
        "body": [
            {
                "id": "compproduct_64ba1e4ff721a",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
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
    "timestamp": 1615923670,
    "signature": "4e4b09ac8b899c6c324ab01f936a8572",
    "content": {
        "success": true,
        "async": false,
        "body": [
            {
                "id": "compproduct_64ba1e4ff721a",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "petit déjeuner",
                "products": [
                    {
                        "id": "product_9f71793f1bff89227",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "Croissant"
                    },
                    {
                        "id": "product_8a72e4d0f1fd12d03",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "café"
                    }
                ],
                "availabilities": [
                    {
                        "id": "cpa_c7447b7ec9c1077aba170",
                        "composite_product_id": "compproduct_64ba1e4ff721a",
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
                        "id": "cpprice_d00ac874b5a9626bd",
                        "composite_product_id": "compproduct_64ba1e4ff721a",
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
                        "id": "cat_3a61a9ed91efe584ca27c",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "repas"
                    }
                ],
                "translations_list": [
                    {
                        "id": "cpt_e1d8f7e2a2e13a3369b78",
                        "composite_product_id": "compproduct_64ba1e4ff721a",
                        "locale": "fr-FR",
                        "title": "Traduction en français",
                        "text": "petit déjeuner",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:55.000000Z",
                        "updated_at": "2021-03-15T15:21:55.000000Z"
                    },
                    {
                        "id": "cpt_933d08fb18a6a691a79fe",
                        "composite_product_id": "compproduct_64ba1e4ff721a",
                        "locale": "en-US",
                        "title": "English Translations",
                        "text": "breakfast",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:55.000000Z",
                        "updated_at": "2021-03-15T15:21:55.000000Z"
                    }
                ]
            }
        ]
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`composite_products/{composite_product_id}`**

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
    'http://dev-product.api.hopn.space/composite_products',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'items_id'=> '["compproduct_64ba1e4ff721a","compproduct_c0b5eb2d85401"]',
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
                'relations' => '["products","availabilities","prices","discounts","categories","translationsList"]',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/composite_products"
);

let params = {
    "items_id": "["compproduct_64ba1e4ff721a","compproduct_c0b5eb2d85401"]",
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
        "relations": "[\"products\",\"availabilities\",\"prices\",\"discounts\",\"categories\",\"translationsList\"]"
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

url = 'http://dev-product.api.hopn.space/composite_products'
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
        "relations": "[\"products\",\"availabilities\",\"prices\",\"discounts\",\"categories\",\"translationsList\"]"
    }
}
params = {
  'items_id': '["compproduct_64ba1e4ff721a","compproduct_c0b5eb2d85401"]',
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
    -G "http://dev-product.api.hopn.space/composite_products?items_id=%5B%22compproduct_64ba1e4ff721a%22%2C%22compproduct_c0b5eb2d85401%22%5D&limit=10&page=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"filters":{"created":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"updated":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"deleted":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"relations":"[\"products\",\"availabilities\",\"prices\",\"discounts\",\"categories\",\"translationsList\"]"}}'

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
                "id": "compproduct_64ba1e4ff721a",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "petit déjeuner"
            },
            {
                "id": "compproduct_c0b5eb2d85401",
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
    "timestamp": 1615923478,
    "signature": "39450b772ae6587f5cc425997001a89f",
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
                "id": "compproduct_64ba1e4ff721a",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "petit déjeuner",
                "products": [
                    {
                        "id": "product_9f71793f1bff89227",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "Croissant"
                    },
                    {
                        "id": "product_8a72e4d0f1fd12d03",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "café"
                    }
                ],
                "availabilities": [
                    {
                        "id": "cpa_c7447b7ec9c1077aba170",
                        "composite_product_id": "compproduct_64ba1e4ff721a",
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
                        "id": "cpprice_d00ac874b5a9626bd",
                        "composite_product_id": "compproduct_64ba1e4ff721a",
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
                        "id": "cat_3a61a9ed91efe584ca27c",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "repas"
                    }
                ],
                "translations_list": [
                    {
                        "id": "cpt_e1d8f7e2a2e13a3369b78",
                        "composite_product_id": "compproduct_64ba1e4ff721a",
                        "locale": "fr-FR",
                        "title": "Traduction en français",
                        "text": "petit déjeuner",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:55.000000Z",
                        "updated_at": "2021-03-15T15:21:55.000000Z"
                    },
                    {
                        "id": "cpt_933d08fb18a6a691a79fe",
                        "composite_product_id": "compproduct_64ba1e4ff721a",
                        "locale": "en-US",
                        "title": "English Translations",
                        "text": "breakfast",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:55.000000Z",
                        "updated_at": "2021-03-15T15:21:55.000000Z"
                    }
                ]
            },
            {
                "id": "compproduct_c0b5eb2d85401",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "déjeuner",
                "products": [
                    {
                        "id": "product_d66672dd6b9052218",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "Salade"
                    },
                    {
                        "id": "product_4c053842dc07c0330",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "apéritif"
                    }
                ],
                "availabilities": [
                    {
                        "id": "cpa_2aa3a84b4ed526f1a9729",
                        "composite_product_id": "compproduct_c0b5eb2d85401",
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
                        "id": "cpprice_7d81298c05e61b019",
                        "composite_product_id": "compproduct_c0b5eb2d85401",
                        "price_including_taxes": 1100,
                        "price_excluding_taxes": 1000,
                        "vat_value": 100,
                        "vat_rate": 10,
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z"
                    }
                ],
                "discounts": [],
                "categories": [
                    {
                        "id": "cat_3a61a9ed91efe584ca27c",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:54.000000Z",
                        "updated_at": "2021-03-15T15:21:54.000000Z",
                        "title": "Traduction en français",
                        "text": "repas"
                    }
                ],
                "translations_list": [
                    {
                        "id": "cpt_78684cdeefa2fef9ab677",
                        "composite_product_id": "compproduct_c0b5eb2d85401",
                        "locale": "fr-FR",
                        "title": "Traduction en français",
                        "text": "déjeuner",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:55.000000Z",
                        "updated_at": "2021-03-15T15:21:55.000000Z"
                    },
                    {
                        "id": "cpt_9bc94f2bff8a8ae7d3110",
                        "composite_product_id": "compproduct_c0b5eb2d85401",
                        "locale": "en-US",
                        "title": "English Translations",
                        "text": "lunch",
                        "deleted_at": null,
                        "created_at": "2021-03-15T15:21:55.000000Z",
                        "updated_at": "2021-03-15T15:21:55.000000Z"
                    }
                ]
            }
        ]
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`composite_products`**

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
    'http://dev-product.api.hopn.space/composite_products',
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
    "http://dev-product.api.hopn.space/composite_products"
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

url = 'http://dev-product.api.hopn.space/composite_products'
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
    "http://dev-product.api.hopn.space/composite_products?title=Traduction+fran%C3%A7aise&locale=fr-FR&text=spa&price_including_taxes=120&price_excluding_taxes=100&vat_value=20&vat_rate=20&day=%5B%22monday%22%2C%22tuesday%22%2C%22wednesday%22%5D&hour_start=08%3A00%3A00&hour_end=10%3A00%3A00&category_id=cat_d10be1a57a0fddafc85b5" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615924550,
    "signature": "df52473c3ceb52e623743217e7540ff4",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "compproduct_f69ab775ee415",
            "updated_at": "2021-03-16T19:55:50.000000Z",
            "created_at": "2021-03-16T19:55:50.000000Z",
            "title": "Traduction française",
            "text": "séminaire"
        }
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`composite_products`**

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
    'http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a',
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
    "http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a"
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

url = 'http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers)
response.json()
```

```bash
curl -X DELETE \
    "http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a" \
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
            "id": "compproduct_64ba1e4ff721a",
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
 **`composite_products/{composite_product_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>composite_product_id</b></code>&nbsp;      <br>
    Composite Product ID



## Translate a product&#039;s description


Allow you to translate a product's description

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/translate',
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
    "http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/translate"
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

url = 'http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/translate'
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
    "http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/translate?locale=en-US&title=English+translations&text=Spa" \
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
            "id": "producttrad_3601f779806e1",
            "composite_product_id": "compproduct_64ba1e4ff721a",
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
 **`composite_products/{composite_product_id}/translate`**

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
    'http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/translate',
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
    "http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/translate"
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

url = 'http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/translate'
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
    "http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/translate?locale=en-US" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615924870,
    "signature": "c56e76aba21f48ef5a56818d7e15429e",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "producttrad_3601f779806e1",
            "composite_product_id": "compproduct_64ba1e4ff721a",
            "locale": "en-US",
            "title": "English translation",
            "text": "Seminary",
            "deleted_at": "2021-03-16T20:01:10.000000Z",
            "created_at": "2021-03-16T20:00:26.000000Z",
            "updated_at": "2021-03-16T20:01:10.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-red">DELETE</small>
 **`composite_products/{composite_product_id}/translate`**

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
    'http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/price',
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
    "http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/price"
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

url = 'http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/price'
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
    "http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/price?price_including_taxes=120&price_excluding_taxes=100&vat_value=20&vat_rate=20" \
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
 **`composite_products/{composite_product_id}/price`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>composite_product_id</b></code>&nbsp;      <br>
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
    'http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/availability',
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
    "http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/availability"
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

url = 'http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/availability'
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
    "http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/availability?day=%5B%22monday%22%2C%22tuesday%22%2C%22wednesday%22%5D&hour_start=08%3A00%3A00&hour_end=10%3A00%3A00" \
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
 **`composite_products/{composite_product_id}/availability`**

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
    'http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/category',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'category_id'=> 'product_9f71793f1bff89227',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/category"
);

let params = {
    "category_id": "product_9f71793f1bff89227",
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

url = 'http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/category'
params = {
  'category_id': 'product_9f71793f1bff89227',
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
    "http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/category?category_id=product_9f71793f1bff89227" \
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
 **`composite_products/{composite_product_id}/category`**

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
    'http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/product',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'product_id'=> 'product_9f71793f1bff89227',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/product"
);

let params = {
    "product_id": "product_9f71793f1bff89227",
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

url = 'http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/product'
params = {
  'product_id': 'product_9f71793f1bff89227',
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
    "http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/product?product_id=product_9f71793f1bff89227" \
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
            "id": "cpp_9385a6b290339ba3803fa",
            "composite_product_id": "compproduct_f69ab775ee415",
            "product_id": "product_9f71793f1bff89227",
            "updated_at": "2021-03-16T20:33:59.000000Z",
            "created_at": "2021-03-16T20:33:59.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`composite_products/{composite_product_id}/product`**

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
    'http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/product',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'product_id'=> 'product_9f71793f1bff89227',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/product"
);

let params = {
    "product_id": "product_9f71793f1bff89227",
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

url = 'http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/product'
params = {
  'product_id': 'product_9f71793f1bff89227',
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
    "http://dev-product.api.hopn.space/composite_products/compproduct_64ba1e4ff721a/product?product_id=product_9f71793f1bff89227" \
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
            "id": "cpp_9385a6b290339ba3803fa",
            "composite_product_id": "compproduct_f69ab775ee415",
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
 **`composite_products/{composite_product_id}/product`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>composite_product_id</b></code>&nbsp;      <br>
    Id of the product to update

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>product_id</b></code>&nbsp;      <br>
    Product ID




