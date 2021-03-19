# Categories


## Retrieve a category


Retrieve all category details.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://dev-product.api.hopn.space/categories/cat_d10be1a57a0fddafc85b5',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'filters' => [
                'relations' => '["products","compositeProducts","discounts"]',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/categories/cat_d10be1a57a0fddafc85b5"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "filters": {
        "relations": "[\"products\",\"compositeProducts\",\"discounts\"]"
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

url = 'http://dev-product.api.hopn.space/categories/cat_d10be1a57a0fddafc85b5'
payload = {
    "filters": {
        "relations": "[\"products\",\"compositeProducts\",\"discounts\"]"
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
    -G "http://dev-product.api.hopn.space/categories/cat_d10be1a57a0fddafc85b5" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"filters":{"relations":"[\"products\",\"compositeProducts\",\"discounts\"]"}}'

```


> Example response (200):

```json
{
    "timestamp": 1615891970,
    "signature": "9b7e5e0b04af4f88c8fa5fd3a7e68df1",
    "content": {
        "success": true,
        "async": false,
        "body": [
            {
                "id": "cat_d10be1a57a0fddafc85b5",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "nourriture"
            }
        ]
    }
}
```
> Example response (200, Relations filter):

```json
{
    "timestamp": 1616158160,
    "signature": "32a7ec5726aa82015c54027ee6946b2b",
    "content": {
        "success": true,
        "async": false,
        "body": [
            {
                "id": "cat_bcc3b36c2dd0ae4a1c57c",
                "deleted_at": null,
                "created_at": "2021-03-19T12:17:31.000000Z",
                "updated_at": "2021-03-19T12:17:31.000000Z",
                "title": "Traduction en français",
                "text": "Abonnement",
                "products": [
                    {
                        "id": "prod_3a3d84897c39a40bc49e",
                        "deleted_at": null,
                        "created_at": "2021-03-19T12:17:31.000000Z",
                        "updated_at": "2021-03-19T12:17:31.000000Z",
                        "title": "Traduction en français",
                        "text": "Croissant"
                    }
                ],
                "composite_products": [],
                "discounts": [
                    {
                        "id": "discount_fffbae84a65baa0a",
                        "discount_type": "eur",
                        "promotional_code_id": null,
                        "amount": 50,
                        "start_at": "2021-05-05 00:00:00",
                        "end_at": "2021-05-25 00:00:00",
                        "deleted_at": null,
                        "created_at": "2021-03-19T12:17:31.000000Z",
                        "updated_at": "2021-03-19T12:17:31.000000Z",
                        "title": "traduction française",
                        "text": "promo d'haloween"
                    }
                ]
            }
        ]
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`categories/{category_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>category_id</b></code>&nbsp;      <br>
    Category ID

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>filters[relations]</b></code>&nbsp; <small>Add</small>         <i>optional</i>    <br>
    a relation in the response



## List all categories


List all the categories.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://dev-product.api.hopn.space/categories',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'items_id'=> '["cat_d10be1a57a0fddafc85b5","cattrad_d8c93817712865f96"]',
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
                'relations' => '["products","compositeProducts","discounts"]',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/categories"
);

let params = {
    "items_id": "["cat_d10be1a57a0fddafc85b5","cattrad_d8c93817712865f96"]",
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
        "relations": "[\"products\",\"compositeProducts\",\"discounts\"]"
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

url = 'http://dev-product.api.hopn.space/categories'
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
        "relations": "[\"products\",\"compositeProducts\",\"discounts\"]"
    }
}
params = {
  'items_id': '["cat_d10be1a57a0fddafc85b5","cattrad_d8c93817712865f96"]',
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
    -G "http://dev-product.api.hopn.space/categories?items_id=%5B%22cat_d10be1a57a0fddafc85b5%22%2C%22cattrad_d8c93817712865f96%22%5D&limit=10&page=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"filters":{"created":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"updated":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"deleted":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"relations":"[\"products\",\"compositeProducts\",\"discounts\"]"}}'

```


> Example response (200):

```json
{
    "timestamp": 1615908193,
    "signature": "910185725fb099a7b5bfb01b80a54d6a",
    "content": {
        "success": true,
        "async": false,
        "pagination": {
            "current_page": 1,
            "last_page": 2,
            "per_page": 5,
            "total": 6,
            "next_page_url": "http:\/\/dev-product.api.hopn.space\/categories?limit=5&page=2",
            "prev_page_url": null
        },
        "body": [
            {
                "id": "cat_bcc3b36c2dd0ae4a1c57c",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "Abonnement"
            },
            {
                "id": "cat_1ddf322d0c198c29b50ce",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "Boisson"
            },
            {
                "id": "cat_d10be1a57a0fddafc85b5",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "nourriture"
            },
            {
                "id": "cat_3a61a9ed91efe584ca27c",
                "deleted_at": null,
                "created_at": "2021-03-15T15:21:54.000000Z",
                "updated_at": "2021-03-15T15:21:54.000000Z",
                "title": "Traduction en français",
                "text": "repas"
            }
        ]
    }
}
```
> Example response (200, Relations Filter):

```json
{
    "timestamp": 1616158109,
    "signature": "fb8c1302357f5343e259454ac804c156",
    "content": {
        "success": true,
        "async": false,
        "pagination": {
            "current_page": 1,
            "last_page": 1,
            "per_page": 5,
            "total": 4,
            "next_page_url": null,
            "prev_page_url": null
        },
        "body": [
            {
                "id": "cat_bcc3b36c2dd0ae4a1c57c",
                "deleted_at": null,
                "created_at": "2021-03-19T12:17:31.000000Z",
                "updated_at": "2021-03-19T12:17:31.000000Z",
                "title": "Traduction en français",
                "text": "Abonnement",
                "products": [
                    {
                        "id": "prod_3a3d84897c39a40bc49e",
                        "deleted_at": null,
                        "created_at": "2021-03-19T12:17:31.000000Z",
                        "updated_at": "2021-03-19T12:17:31.000000Z",
                        "title": "Traduction en français",
                        "text": "Croissant"
                    }
                ],
                "composite_products": [],
                "discounts": [
                    {
                        "id": "discount_fffbae84a65baa0a",
                        "discount_type": "eur",
                        "promotional_code_id": null,
                        "amount": 50,
                        "start_at": "2021-05-05 00:00:00",
                        "end_at": "2021-05-25 00:00:00",
                        "deleted_at": null,
                        "created_at": "2021-03-19T12:17:31.000000Z",
                        "updated_at": "2021-03-19T12:17:31.000000Z",
                        "title": "traduction française",
                        "text": "promo d'haloween"
                    }
                ]
            },
            {
                "id": "cat_1ddf322d0c198c29b50ce",
                "deleted_at": null,
                "created_at": "2021-03-19T12:17:31.000000Z",
                "updated_at": "2021-03-19T12:17:31.000000Z",
                "title": "Traduction en français",
                "text": "Boisson",
                "products": [
                    {
                        "id": "prod_672832afc671d36c6213",
                        "deleted_at": null,
                        "created_at": "2021-03-19T12:17:31.000000Z",
                        "updated_at": "2021-03-19T12:17:31.000000Z",
                        "title": "Traduction en français",
                        "text": "Mimosa"
                    },
                    {
                        "id": "prod_1344f9b420f516b26861",
                        "deleted_at": null,
                        "created_at": "2021-03-19T12:17:31.000000Z",
                        "updated_at": "2021-03-19T12:17:31.000000Z",
                        "title": "Traduction en français",
                        "text": "café"
                    },
                    {
                        "id": "prod_bc477fe21a7c92c52256",
                        "deleted_at": null,
                        "created_at": "2021-03-19T12:17:31.000000Z",
                        "updated_at": "2021-03-19T12:17:31.000000Z",
                        "title": "Traduction en français",
                        "text": "apéritif"
                    }
                ],
                "composite_products": [],
                "discounts": []
            },
            {
                "id": "cat_d10be1a57a0fddafc85b5",
                "deleted_at": null,
                "created_at": "2021-03-19T12:17:31.000000Z",
                "updated_at": "2021-03-19T12:17:31.000000Z",
                "title": "Traduction en français",
                "text": "nourriture",
                "products": [
                    {
                        "id": "prod_c93e0a2194593f85a7a6",
                        "deleted_at": null,
                        "created_at": "2021-03-19T12:17:31.000000Z",
                        "updated_at": "2021-03-19T12:17:31.000000Z",
                        "title": "Traduction en français",
                        "text": "Salade"
                    }
                ],
                "composite_products": [],
                "discounts": []
            },
            {
                "id": "cat_3a61a9ed91efe584ca27c",
                "deleted_at": null,
                "created_at": "2021-03-19T12:17:31.000000Z",
                "updated_at": "2021-03-19T12:17:31.000000Z",
                "title": "Traduction en français",
                "text": "repas",
                "products": [],
                "composite_products": [
                    {
                        "id": "prodc_05ba52372e3c09a8219",
                        "deleted_at": null,
                        "created_at": "2021-03-19T12:17:31.000000Z",
                        "updated_at": "2021-03-19T12:17:31.000000Z",
                        "title": "Traduction en français",
                        "text": "petit déjeuner"
                    },
                    {
                        "id": "prodc_bb6bca80cb0ac3484fb",
                        "deleted_at": null,
                        "created_at": "2021-03-19T12:17:31.000000Z",
                        "updated_at": "2021-03-19T12:17:31.000000Z",
                        "title": "Traduction en français",
                        "text": "déjeuner"
                    }
                ],
                "discounts": []
            }
        ]
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`categories`**

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



## Create a category


Allows you to create a new category.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://dev-product.api.hopn.space/categories',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'title'=> 'Traduction française',
            'locale'=> 'fr-FR',
            'text'=> 'Soins',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/categories"
);

let params = {
    "title": "Traduction française",
    "locale": "fr-FR",
    "text": "Soins",
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

url = 'http://dev-product.api.hopn.space/categories'
params = {
  'title': 'Traduction française',
  'locale': 'fr-FR',
  'text': 'Soins',
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
    "http://dev-product.api.hopn.space/categories?title=Traduction+fran%C3%A7aise&locale=fr-FR&text=Soins" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615892262,
    "signature": "396b2ef2a1b7f2b1e65093c95a727eda",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "cat_d534f04d2c1902588573a",
            "updated_at": "2021-03-16T10:57:42.000000Z",
            "created_at": "2021-03-16T10:57:42.000000Z",
            "title": "Traduction française",
            "text": "Soins"
        }
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`categories`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>title</b></code>&nbsp;      <br>
    Title of the description

<code><b>locale</b></code>&nbsp;      <br>
    Locale

<code><b>text</b></code>&nbsp;      <br>
    Description



## Delete a category


Delete a category and anonymize the data.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://dev-product.api.hopn.space/categories/cat_d10be1a57a0fddafc85b5',
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
    "http://dev-product.api.hopn.space/categories/cat_d10be1a57a0fddafc85b5"
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

url = 'http://dev-product.api.hopn.space/categories/cat_d10be1a57a0fddafc85b5'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers)
response.json()
```

```bash
curl -X DELETE \
    "http://dev-product.api.hopn.space/categories/cat_d10be1a57a0fddafc85b5" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615898916,
    "signature": "752ef8f23f86eb628958c7be72985d12",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "cat_d534f04d2c1902588573a",
            "deleted_at": "2021-03-16T12:48:36.000000Z",
            "created_at": "2021-03-16T10:57:42.000000Z",
            "updated_at": "2021-03-16T12:48:36.000000Z",
            "title": "Traduction française",
            "text": "Soins"
        }
    }
}
```

### Request
<small class="badge badge-red">DELETE</small>
 **`categories/{category_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>category_id</b></code>&nbsp;      <br>
    Category ID



## Translate a category&#039;s description


Allow you to translate a category's description

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://dev-product.api.hopn.space/categories/cat_d10be1a57a0fddafc85b5/translate',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'locale'=> 'en-US',
            'title'=> 'English translations',
            'text'=> 'subscription',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/categories/cat_d10be1a57a0fddafc85b5/translate"
);

let params = {
    "locale": "en-US",
    "title": "English translations",
    "text": "subscription",
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

url = 'http://dev-product.api.hopn.space/categories/cat_d10be1a57a0fddafc85b5/translate'
params = {
  'locale': 'en-US',
  'title': 'English translations',
  'text': 'subscription',
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
    "http://dev-product.api.hopn.space/categories/cat_d10be1a57a0fddafc85b5/translate?locale=en-US&title=English+translations&text=subscription" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615899810,
    "signature": "bcb5e0896723649122bc31278620574b",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "cattrad_8753c99c98e1e45e8",
            "category_id": "cat_30f5cb24a6eb5c50318bf",
            "locale": "en-US",
            "title": "English translation",
            "text": "Care",
            "deleted_at": null,
            "created_at": "2021-03-16T13:03:30.000000Z",
            "updated_at": "2021-03-16T13:03:30.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`categories/{category_id}/translate`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>category_id</b></code>&nbsp;      <br>
    Category ID

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>locale</b></code>&nbsp;      <br>
    Locale

<code><b>title</b></code>&nbsp;      <br>
    The title of the translation

<code><b>text</b></code>&nbsp;      <br>
    The description of the category translated



## Remove a category&#039;s description translation


Allow you to remove a category's description translation.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://dev-product.api.hopn.space/categories/cat_d10be1a57a0fddafc85b5/translate',
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
    "http://dev-product.api.hopn.space/categories/cat_d10be1a57a0fddafc85b5/translate"
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

url = 'http://dev-product.api.hopn.space/categories/cat_d10be1a57a0fddafc85b5/translate'
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
    "http://dev-product.api.hopn.space/categories/cat_d10be1a57a0fddafc85b5/translate?locale=en-US" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615899817,
    "signature": "e4e6ba55ca00f54856bc36717f94bbf2",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "cattrad_8753c99c98e1e45e8",
            "category_id": "cat_30f5cb24a6eb5c50318bf",
            "locale": "en-US",
            "title": "English translation",
            "text": "Care",
            "deleted_at": "2021-03-16T13:03:37.000000Z",
            "created_at": "2021-03-16T13:03:30.000000Z",
            "updated_at": "2021-03-16T13:03:37.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-red">DELETE</small>
 **`categories/{category_id}/translate`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>category_id</b></code>&nbsp;      <br>
    Category ID

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>locale</b></code>&nbsp;      <br>
    Locale




