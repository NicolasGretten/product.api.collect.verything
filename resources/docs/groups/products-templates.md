# Products Templates


## Retrieve a product Template


Retrieve all product Template details.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://dev-product.api.hopn.space/products-templates/prodtemplate_3a3d84898a',
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
    "http://dev-product.api.hopn.space/products-templates/prodtemplate_3a3d84898a"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://dev-product.api.hopn.space/products-templates/prodtemplate_3a3d84898a'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```

```bash
curl -X GET \
    -G "http://dev-product.api.hopn.space/products-templates/prodtemplate_3a3d84898a" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1616154971,
    "signature": "e6231738638eaebcc13a902f1e01b163",
    "content": {
        "success": true,
        "async": false,
        "body": [
            {
                "id": "prodtemplate_3a3d84898a",
                "category_id": "cat_1ddf322d0c198c29b50ce",
                "deleted_at": null,
                "created_at": "2021-03-19T10:33:44.000000Z",
                "updated_at": "2021-03-19T10:33:44.000000Z",
                "title": "Traduction en français",
                "text": "Boisson 01"
            }
        ]
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`products-templates/{product_template_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>product_template_id</b></code>&nbsp;      <br>
    Product Template ID



## List all products templates


List all the products templates.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://dev-product.api.hopn.space/products-templates',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'items_id'=> '["prodtemplate_3a3d84898a","prodtemplate_3a3d84897b"]',
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
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/products-templates"
);

let params = {
    "items_id": "["prodtemplate_3a3d84898a","prodtemplate_3a3d84897b"]",
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
        }
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

url = 'http://dev-product.api.hopn.space/products-templates'
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
        }
    }
}
params = {
  'items_id': '["prodtemplate_3a3d84898a","prodtemplate_3a3d84897b"]',
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
    -G "http://dev-product.api.hopn.space/products-templates?items_id=%5B%22prodtemplate_3a3d84898a%22%2C%22prodtemplate_3a3d84897b%22%5D&limit=10&page=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"filters":{"created":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"updated":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"deleted":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"}}}'

```


> Example response (200):

```json
{
    "timestamp": 1616151615,
    "signature": "fa3c5a4836f537c590b30ac7ceea5d18",
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
                "id": "prodtemplate_3a3d84898a",
                "category_id": "cat_1ddf322d0c198c29b50ce",
                "deleted_at": null,
                "created_at": "2021-03-19T10:33:44.000000Z",
                "updated_at": "2021-03-19T10:33:44.000000Z",
                "title": "Traduction en français",
                "text": "Boisson 01"
            },
            {
                "id": "prodtemplate_3a3d84897b",
                "category_id": "cat_d10be1a57a0fddafc85b5",
                "deleted_at": null,
                "created_at": "2021-03-19T10:33:44.000000Z",
                "updated_at": "2021-03-19T10:33:44.000000Z",
                "title": "Traduction en français",
                "text": "Nourriture 01"
            }
        ]
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`products-templates`**

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



## Create a product template


Allows you to create a new product template.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://dev-product.api.hopn.space/products-templates',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'title'=> 'Traduction française',
            'locale'=> 'fr-FR',
            'text'=> 'Boisson 01',
            'category_id'=> 'cat_d10be1a57a0fddafc85b5',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/products-templates"
);

let params = {
    "title": "Traduction française",
    "locale": "fr-FR",
    "text": "Boisson 01",
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

url = 'http://dev-product.api.hopn.space/products-templates'
params = {
  'title': 'Traduction française',
  'locale': 'fr-FR',
  'text': 'Boisson 01',
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
    "http://dev-product.api.hopn.space/products-templates?title=Traduction+fran%C3%A7aise&locale=fr-FR&text=Boisson+01&category_id=cat_d10be1a57a0fddafc85b5" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1616155133,
    "signature": "75b336d33b794b93d14b6b1e762170ea",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodtemplate_3a3d84898a",
            "category_id": "cat_1ddf322d0c198c29b50ce",
            "updated_at": "2021-03-19T11:58:53.000000Z",
            "created_at": "2021-03-19T11:58:53.000000Z",
            "title": "Traduction française",
            "text": "Boisson 02"
        }
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`products-templates`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>title</b></code>&nbsp;      <br>
    Title of the description

<code><b>locale</b></code>&nbsp;      <br>
    Locale

<code><b>text</b></code>&nbsp;      <br>
    Description

<code><b>category_id</b></code>&nbsp;      <br>
    Category ID



## Delete a product template


Delete a product template and anonymize the data.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://dev-product.api.hopn.space/products-templates/prodtemplate_3a3d84898a',
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
    "http://dev-product.api.hopn.space/products-templates/prodtemplate_3a3d84898a"
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

url = 'http://dev-product.api.hopn.space/products-templates/prodtemplate_3a3d84898a'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers)
response.json()
```

```bash
curl -X DELETE \
    "http://dev-product.api.hopn.space/products-templates/prodtemplate_3a3d84898a" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1616155246,
    "signature": "57539a06dae2c6084acde90bc39c9d81",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodtemplate_3a3d84898a",
            "category_id": "cat_1ddf322d0c198c29b50ce",
            "deleted_at": "2021-03-19T12:00:46.000000Z",
            "created_at": "2021-03-19T11:58:53.000000Z",
            "updated_at": "2021-03-19T12:00:46.000000Z",
            "title": "Traduction française",
            "text": "salle de coworking"
        }
    }
}
```

### Request
<small class="badge badge-red">DELETE</small>
 **`products-templates/{product_template_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>product_template_id</b></code>&nbsp;      <br>
    Product Template ID



## Translate a product template&#039;s description


Allow you to translate a product template's description

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://dev-product.api.hopn.space/products-templates/prodtemplate_3a3d84898a/translate',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'locale'=> 'en-US',
            'title'=> 'English translations',
            'text'=> 'Drink 01',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/products-templates/prodtemplate_3a3d84898a/translate"
);

let params = {
    "locale": "en-US",
    "title": "English translations",
    "text": "Drink 01",
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

url = 'http://dev-product.api.hopn.space/products-templates/prodtemplate_3a3d84898a/translate'
params = {
  'locale': 'en-US',
  'title': 'English translations',
  'text': 'Drink 01',
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
    "http://dev-product.api.hopn.space/products-templates/prodtemplate_3a3d84898a/translate?locale=en-US&title=English+translations&text=Drink+01" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1616155165,
    "signature": "30174ff57ca84dd89f4682e2c134c9ab",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodtemplatetrad_26d1671d",
            "product_template_id": "prodtemplate_3a3d84898a",
            "locale": "en-US",
            "title": "English translation",
            "text": "Drink 02",
            "deleted_at": null,
            "created_at": "2021-03-19T11:59:25.000000Z",
            "updated_at": "2021-03-19T11:59:25.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`products-templates/{product_template_id}/translate`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>product_template_id</b></code>&nbsp;      <br>
    ProductTemplate ID

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>locale</b></code>&nbsp;      <br>
    Locale

<code><b>title</b></code>&nbsp;      <br>
    The title of the translation

<code><b>text</b></code>&nbsp;      <br>
    The description of the product template translated



## Remove a product template&#039;s description translation


Allow you to remove a product template's description translation.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://dev-product.api.hopn.space/products-templates/prodtemplate_3a3d84898a/translate',
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
    "http://dev-product.api.hopn.space/products-templates/prodtemplate_3a3d84898a/translate"
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

url = 'http://dev-product.api.hopn.space/products-templates/prodtemplate_3a3d84898a/translate'
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
    "http://dev-product.api.hopn.space/products-templates/prodtemplate_3a3d84898a/translate?locale=en-US" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1616155231,
    "signature": "b665835d48b8666f41b035a7e3482fd1",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "prodtemplatetrad_26d1671d",
            "product_template_id": "prodtemplate_3a3d84898a",
            "locale": "en-US",
            "title": "English translation",
            "text": "Drink 02",
            "deleted_at": "2021-03-19T12:00:31.000000Z",
            "created_at": "2021-03-19T11:59:25.000000Z",
            "updated_at": "2021-03-19T12:00:31.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-red">DELETE</small>
 **`products-templates/{product_template_id}/translate`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>product_template_id</b></code>&nbsp;      <br>
    Product Template ID

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>locale</b></code>&nbsp;      <br>
    Locale




