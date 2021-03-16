# Promotional Codes


## Retrieve a promotional_code


Retrieve all promotional_code details.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://dev-product.api.hopn.space/promotional_codes/promocode_17d78ae0a3bfb0a',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'filters' => [
                'relations' => '["translationsList","discounts"]',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/promotional_codes/promocode_17d78ae0a3bfb0a"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "filters": {
        "relations": "[\"translationsList\",\"discounts\"]"
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

url = 'http://dev-product.api.hopn.space/promotional_codes/promocode_17d78ae0a3bfb0a'
payload = {
    "filters": {
        "relations": "[\"translationsList\",\"discounts\"]"
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
    -G "http://dev-product.api.hopn.space/promotional_codes/promocode_17d78ae0a3bfb0a" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"filters":{"relations":"[\"translationsList\",\"discounts\"]"}}'

```


> Example response (200):

```json
{
    "timestamp": 1615937402,
    "signature": "8ef3541248f0f1ac43a48d1a4a9a88b2",
    "content": {
        "success": true,
        "async": false,
        "body": [
            {
                "id": "promocode_17d78ae0a3bfb0a",
                "code": "PROMO10",
                "start_at": "2021-03-15 00:00:00",
                "end_at": null,
                "amount": 150,
                "number_used": 0,
                "maximum_usage": 1,
                "combinable_with_offers": false,
                "promotional_code_type": "pourcent",
                "deleted_at": null,
                "created_at": "2021-03-16T21:54:03.000000Z",
                "updated_at": "2021-03-16T21:54:03.000000Z",
                "title": "Traduction en français",
                "text": "Code promo 10%"
            }
        ]
    }
}
```
> Example response (200, Relations filter):

```json
{
    "timestamp": 1615937418,
    "signature": "89652cf07c213a7d38aea727c8bfae93",
    "content": {
        "success": true,
        "async": false,
        "body": [
            {
                "id": "promocode_17d78ae0a3bfb0a",
                "code": "PROMO10",
                "start_at": "2021-03-15 00:00:00",
                "end_at": null,
                "amount": 150,
                "number_used": 0,
                "maximum_usage": 1,
                "combinable_with_offers": false,
                "promotional_code_type": "pourcent",
                "deleted_at": null,
                "created_at": "2021-03-16T21:54:03.000000Z",
                "updated_at": "2021-03-16T21:54:03.000000Z",
                "title": "Traduction en français",
                "text": "Code promo 10%",
                "translations_list": [
                    {
                        "id": "promocodetrade1f00d7e2e49",
                        "promotional_code_id": "promocode_17d78ae0a3bfb0a",
                        "locale": "fr-FR",
                        "title": "Traduction en français",
                        "text": "Code promo 10%",
                        "deleted_at": null,
                        "created_at": "2021-03-16T21:54:03.000000Z",
                        "updated_at": "2021-03-16T21:54:03.000000Z"
                    },
                    {
                        "id": "promocodetrad28a04008b127",
                        "promotional_code_id": "promocode_17d78ae0a3bfb0a",
                        "locale": "en-US",
                        "title": "English Translations",
                        "text": "Promo code 10%",
                        "deleted_at": null,
                        "created_at": "2021-03-16T21:54:03.000000Z",
                        "updated_at": "2021-03-16T21:54:03.000000Z"
                    }
                ],
                "discounts": [
                    {
                        "id": "discount_34acc06c4ccd5022",
                        "discount_type": "pourcent",
                        "promotional_code_id": "promocode_17d78ae0a3bfb0a",
                        "amount": 10,
                        "start_at": "2021-05-05 00:00:00",
                        "end_at": "2021-05-25 00:00:00",
                        "deleted_at": null,
                        "created_at": "2021-03-16T21:54:03.000000Z",
                        "updated_at": "2021-03-16T21:54:03.000000Z",
                        "title": "traduction française",
                        "text": "promo d'été"
                    }
                ]
            }
        ]
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`promotional_codes/{promotional_code_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>promotional_code_id</b></code>&nbsp;      <br>
    Promotional Code ID

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>filters[relations]</b></code>&nbsp; <small>Add</small>         <i>optional</i>    <br>
    a relation in the response



## List all promotional codes


List all the promotional codes.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://dev-product.api.hopn.space/promotional_codes',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'items_id'=> '["promocode_17d78ae0a3bfb0a","promocode_779cf772199954f"]',
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
                'relations' => '["translationsList","discounts"]',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/promotional_codes"
);

let params = {
    "items_id": "["promocode_17d78ae0a3bfb0a","promocode_779cf772199954f"]",
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
        "relations": "[\"translationsList\",\"discounts\"]"
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

url = 'http://dev-product.api.hopn.space/promotional_codes'
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
        "relations": "[\"translationsList\",\"discounts\"]"
    }
}
params = {
  'items_id': '["promocode_17d78ae0a3bfb0a","promocode_779cf772199954f"]',
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
    -G "http://dev-product.api.hopn.space/promotional_codes?items_id=%5B%22promocode_17d78ae0a3bfb0a%22%2C%22promocode_779cf772199954f%22%5D&limit=10&page=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"filters":{"created":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"updated":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"deleted":{"gt":"1602688060","gte":"1602688060","lt":"1602688060","lte":"1602688060","order":"ASC"},"relations":"[\"translationsList\",\"discounts\"]"}}'

```


> Example response (200):

```json
{
    "timestamp": 1615937086,
    "signature": "1ba32122f450bbed0b1dba302fbf791f",
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
                "id": "promocode_17d78ae0a3bfb0a",
                "code": "PROMO10",
                "start_at": "2021-03-15 00:00:00",
                "end_at": null,
                "amount": 150,
                "number_used": 0,
                "maximum_usage": 1,
                "combinable_with_offers": false,
                "promotional_code_type": "pourcent",
                "deleted_at": null,
                "created_at": "2021-03-16T21:54:03.000000Z",
                "updated_at": "2021-03-16T21:54:03.000000Z",
                "title": "Traduction en français",
                "text": "Code promo 10%"
            },
            {
                "id": "promocode_779cf772199954f",
                "code": "PROMO50",
                "start_at": "2021-03-20 00:00:00",
                "end_at": "2021-03-30 00:00:00",
                "amount": 50,
                "number_used": 0,
                "maximum_usage": 1,
                "combinable_with_offers": true,
                "promotional_code_type": "pourcent",
                "deleted_at": null,
                "created_at": "2021-03-16T21:54:03.000000Z",
                "updated_at": "2021-03-16T21:54:03.000000Z",
                "title": "Traduction en français",
                "text": "Code promo 50%"
            }
        ]
    }
}
```
> Example response (200, Relations Filter):

```json
{
    "timestamp": 1615937295,
    "signature": "42e0b1e36c512ee0c009320f29cdea40",
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
                "id": "promocode_17d78ae0a3bfb0a",
                "code": "PROMO10",
                "start_at": "2021-03-15 00:00:00",
                "end_at": null,
                "amount": 150,
                "number_used": 0,
                "maximum_usage": 1,
                "combinable_with_offers": false,
                "promotional_code_type": "pourcent",
                "deleted_at": null,
                "created_at": "2021-03-16T21:54:03.000000Z",
                "updated_at": "2021-03-16T21:54:03.000000Z",
                "title": "Traduction en français",
                "text": "Code promo 10%",
                "translations_list": [
                    {
                        "id": "promocodetrade1f00d7e2e49",
                        "promotional_code_id": "promocode_17d78ae0a3bfb0a",
                        "locale": "fr-FR",
                        "title": "Traduction en français",
                        "text": "Code promo 10%",
                        "deleted_at": null,
                        "created_at": "2021-03-16T21:54:03.000000Z",
                        "updated_at": "2021-03-16T21:54:03.000000Z"
                    },
                    {
                        "id": "promocodetrad28a04008b127",
                        "promotional_code_id": "promocode_17d78ae0a3bfb0a",
                        "locale": "en-US",
                        "title": "English Translations",
                        "text": "Promo code 10%",
                        "deleted_at": null,
                        "created_at": "2021-03-16T21:54:03.000000Z",
                        "updated_at": "2021-03-16T21:54:03.000000Z"
                    }
                ],
                "discounts": [
                    {
                        "id": "discount_34acc06c4ccd5022",
                        "discount_type": "pourcent",
                        "promotional_code_id": "promocode_17d78ae0a3bfb0a",
                        "amount": 10,
                        "start_at": "2021-05-05 00:00:00",
                        "end_at": "2021-05-25 00:00:00",
                        "deleted_at": null,
                        "created_at": "2021-03-16T21:54:03.000000Z",
                        "updated_at": "2021-03-16T21:54:03.000000Z",
                        "title": "traduction française",
                        "text": "promo d'été"
                    }
                ]
            },
            {
                "id": "promocode_779cf772199954f",
                "code": "PROMO50",
                "start_at": "2021-03-20 00:00:00",
                "end_at": "2021-03-30 00:00:00",
                "amount": 50,
                "number_used": 0,
                "maximum_usage": 1,
                "combinable_with_offers": true,
                "promotional_code_type": "pourcent",
                "deleted_at": null,
                "created_at": "2021-03-16T21:54:03.000000Z",
                "updated_at": "2021-03-16T21:54:03.000000Z",
                "title": "Traduction en français",
                "text": "Code promo 50%",
                "translations_list": [
                    {
                        "id": "promocodetradf6130342219f",
                        "promotional_code_id": "promocode_779cf772199954f",
                        "locale": "fr-FR",
                        "title": "Traduction en français",
                        "text": "Code promo 50%",
                        "deleted_at": null,
                        "created_at": "2021-03-16T21:54:03.000000Z",
                        "updated_at": "2021-03-16T21:54:03.000000Z"
                    },
                    {
                        "id": "promocodetrad663f5599c466",
                        "promotional_code_id": "promocode_779cf772199954f",
                        "locale": "en-US",
                        "title": "English Translations",
                        "text": "Promo code 50%",
                        "deleted_at": null,
                        "created_at": "2021-03-16T21:54:03.000000Z",
                        "updated_at": "2021-03-16T21:54:03.000000Z"
                    }
                ],
                "discounts": [
                    {
                        "id": "discount_ef5285ab40773ab4",
                        "discount_type": "pourcent",
                        "promotional_code_id": "promocode_779cf772199954f",
                        "amount": 50,
                        "start_at": "2021-03-16 00:00:00",
                        "end_at": "2021-05-16 00:00:00",
                        "deleted_at": null,
                        "created_at": "2021-03-16T22:10:11.000000Z",
                        "updated_at": "2021-03-16T22:10:11.000000Z",
                        "title": "Traduction française",
                        "text": "Promo d'hiver"
                    }
                ]
            }
        ]
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`promotional_codes`**

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



## Create a promotional_code


Allows you to create a new promotional_code.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://dev-product.api.hopn.space/promotional_codes',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'title'=> 'Traduction française',
            'locale'=> 'fr-FR',
            'code'=> 'PROMO20',
            'start_at'=> '1970-01-01 00:00:00',
            'end_at'=> '1970-01-01 00:00:00',
            'amount'=> '150',
            'number_used'=> '50',
            'maximum_usage'=> '1',
            'combinable_with_offers'=> 'true',
            'promotional_code_type'=> 'pourcent',
            'text'=> 'code promo spéciale',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/promotional_codes"
);

let params = {
    "title": "Traduction française",
    "locale": "fr-FR",
    "code": "PROMO20",
    "start_at": "1970-01-01 00:00:00",
    "end_at": "1970-01-01 00:00:00",
    "amount": "150",
    "number_used": "50",
    "maximum_usage": "1",
    "combinable_with_offers": "true",
    "promotional_code_type": "pourcent",
    "text": "code promo spéciale",
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

url = 'http://dev-product.api.hopn.space/promotional_codes'
params = {
  'title': 'Traduction française',
  'locale': 'fr-FR',
  'code': 'PROMO20',
  'start_at': '1970-01-01 00:00:00',
  'end_at': '1970-01-01 00:00:00',
  'amount': '150',
  'number_used': '50',
  'maximum_usage': '1',
  'combinable_with_offers': 'true',
  'promotional_code_type': 'pourcent',
  'text': 'code promo spéciale',
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
    "http://dev-product.api.hopn.space/promotional_codes?title=Traduction+fran%C3%A7aise&locale=fr-FR&code=PROMO20&start_at=1970-01-01+00%3A00%3A00&end_at=1970-01-01+00%3A00%3A00&amount=150&number_used=50&maximum_usage=1&combinable_with_offers=true&promotional_code_type=pourcent&text=code+promo+sp%C3%A9ciale" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615938456,
    "signature": "0baab0d7dc5f183bb406ed4eca79303a",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "promocode_e0e4cf83ded071a",
            "code": "BLACKFRIDAY",
            "start_at": "2021-03-17 00:00:00",
            "end_at": "2021-03-17 00:00:00",
            "amount": "150",
            "number_used": "50",
            "maximum_usage": "150",
            "combinable_with_offers": "0",
            "promotional_code_type": "EUR",
            "updated_at": "2021-03-16T23:47:36.000000Z",
            "created_at": "2021-03-16T23:47:36.000000Z",
            "title": "traduction française",
            "text": "Code promo spéciale black friday"
        }
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`promotional_codes`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>title</b></code>&nbsp;      <br>
    Title of the description

<code><b>locale</b></code>&nbsp;      <br>
    Locale

<code><b>code</b></code>&nbsp;      <br>
    Code

<code><b>start_at</b></code>&nbsp;      <br>
    date start

<code><b>end_at</b></code>&nbsp;      <br>
    date end

<code><b>amount</b></code>&nbsp;      <br>
    amount of use

<code><b>number_used</b></code>&nbsp;      <br>
    number already used

<code><b>maximum_usage</b></code>&nbsp;      <br>
    max usage

<code><b>combinable_with_offers</b></code>&nbsp;      <br>
    combinable with others offers

<code><b>promotional_code_type</b></code>&nbsp;      <br>
    type: pourcent or EUR/US

<code><b>text</b></code>&nbsp;      <br>
    Description



## Update a promotional_code


You can update promotional_code data.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://dev-product.api.hopn.space/promotional_codes/promocode_e0e4cf83ded071a',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'code'=> 'PROMO20',
            'start_at'=> '1970-01-01 00:00:00',
            'end_at'=> '1970-01-01 00:00:00',
            'amount'=> '150',
            'number_used'=> '50',
            'maximum_usage'=> '1',
            'combinable_with_offers'=> 'true',
            'promotional_code_type'=> 'pourcent',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/promotional_codes/promocode_e0e4cf83ded071a"
);

let params = {
    "code": "PROMO20",
    "start_at": "1970-01-01 00:00:00",
    "end_at": "1970-01-01 00:00:00",
    "amount": "150",
    "number_used": "50",
    "maximum_usage": "1",
    "combinable_with_offers": "true",
    "promotional_code_type": "pourcent",
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

url = 'http://dev-product.api.hopn.space/promotional_codes/promocode_e0e4cf83ded071a'
params = {
  'code': 'PROMO20',
  'start_at': '1970-01-01 00:00:00',
  'end_at': '1970-01-01 00:00:00',
  'amount': '150',
  'number_used': '50',
  'maximum_usage': '1',
  'combinable_with_offers': 'true',
  'promotional_code_type': 'pourcent',
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
    "http://dev-product.api.hopn.space/promotional_codes/promocode_e0e4cf83ded071a?code=PROMO20&start_at=1970-01-01+00%3A00%3A00&end_at=1970-01-01+00%3A00%3A00&amount=150&number_used=50&maximum_usage=1&combinable_with_offers=true&promotional_code_type=pourcent" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615938610,
    "signature": "5f6b48666a23e4e42a7e02089d1e3f3a",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "promocode_e0e4cf83ded071a",
            "code": "BLKFRD",
            "start_at": "2021-03-17 00:00:00",
            "end_at": "2021-03-25 00:00:00",
            "amount": "150",
            "number_used": "50",
            "maximum_usage": "150",
            "combinable_with_offers": "0",
            "promotional_code_type": "EUR",
            "deleted_at": null,
            "created_at": "2021-03-16T23:47:36.000000Z",
            "updated_at": "2021-03-16T23:50:10.000000Z",
            "title": "traduction française",
            "text": "Code promo spéciale black friday"
        }
    }
}
```

### Request
<small class="badge badge-purple">PATCH</small>
 **`promotional_codes/{promotional_code_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>promotional_code_id</b></code>&nbsp;      <br>
    Id of the promotional_code to update

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>code</b></code>&nbsp;      <br>
    Code

<code><b>start_at</b></code>&nbsp;      <br>
    date start

<code><b>end_at</b></code>&nbsp;      <br>
    date end

<code><b>amount</b></code>&nbsp;      <br>
    amount of use

<code><b>number_used</b></code>&nbsp;      <br>
    number already used

<code><b>maximum_usage</b></code>&nbsp;      <br>
    max usage

<code><b>combinable_with_offers</b></code>&nbsp;      <br>
    combinable with others offers

<code><b>promotional_code_type</b></code>&nbsp;      <br>
    type: pourcent or EUR/US



## Delete a promotional_code


Delete a promotional_code and anonymize the data.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://dev-product.api.hopn.space/promotional_codes/promocode_17d78ae0a3bfb0a',
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
    "http://dev-product.api.hopn.space/promotional_codes/promocode_17d78ae0a3bfb0a"
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

url = 'http://dev-product.api.hopn.space/promotional_codes/promocode_17d78ae0a3bfb0a'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers)
response.json()
```

```bash
curl -X DELETE \
    "http://dev-product.api.hopn.space/promotional_codes/promocode_17d78ae0a3bfb0a" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615938768,
    "signature": "39deca1656d8464d7669a5a11654f79f",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "promocode_e0e4cf83ded071a",
            "code": "BLKFRD",
            "start_at": "2021-03-17 00:00:00",
            "end_at": "2021-03-25 00:00:00",
            "amount": 150,
            "number_used": 50,
            "maximum_usage": 150,
            "combinable_with_offers": false,
            "promotional_code_type": "EUR",
            "deleted_at": "2021-03-16T23:52:48.000000Z",
            "created_at": "2021-03-16T23:47:36.000000Z",
            "updated_at": "2021-03-16T23:52:48.000000Z",
            "title": "traduction française",
            "text": "Code promo spéciale black friday"
        }
    }
}
```

### Request
<small class="badge badge-red">DELETE</small>
 **`promotional_codes/{promotional_code_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>promotional_code_id</b></code>&nbsp;      <br>
    Promotional Code ID



## Translate a promotional_code&#039;s description


Allow you to translate a promotional_code's description

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://dev-product.api.hopn.space/promotional_codes/promocode_17d78ae0a3bfb0a/translate',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'locale'=> 'en-US',
            'title'=> 'English translations',
            'text'=> 'Special black friday code',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://dev-product.api.hopn.space/promotional_codes/promocode_17d78ae0a3bfb0a/translate"
);

let params = {
    "locale": "en-US",
    "title": "English translations",
    "text": "Special black friday code",
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

url = 'http://dev-product.api.hopn.space/promotional_codes/promocode_17d78ae0a3bfb0a/translate'
params = {
  'locale': 'en-US',
  'title': 'English translations',
  'text': 'Special black friday code',
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
    "http://dev-product.api.hopn.space/promotional_codes/promocode_17d78ae0a3bfb0a/translate?locale=en-US&title=English+translations&text=Special+black+friday+code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615938679,
    "signature": "37518f09d1674ae6717a89448dbf2f09",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "cattrad_a2656128dd2f18150",
            "promotional_code_id": "promocode_e0e4cf83ded071a",
            "locale": "en-US",
            "title": "English translation",
            "text": "special black friday discount code",
            "deleted_at": null,
            "created_at": "2021-03-16T23:51:19.000000Z",
            "updated_at": "2021-03-16T23:51:19.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`promotional_codes/{promotional_code_id}/translate`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>promotional_code_id</b></code>&nbsp;      <br>
    Promotional Code ID

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>locale</b></code>&nbsp;      <br>
    Locale

<code><b>title</b></code>&nbsp;      <br>
    The title of the translation

<code><b>text</b></code>&nbsp;      <br>
    The description of the promotional_code translated



## Remove a promotional_code&#039;s description translation


Allow you to remove a promotional_code's description translation.

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://dev-product.api.hopn.space/promotional_codes/promocode_17d78ae0a3bfb0a/translate',
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
    "http://dev-product.api.hopn.space/promotional_codes/promocode_17d78ae0a3bfb0a/translate"
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

url = 'http://dev-product.api.hopn.space/promotional_codes/promocode_17d78ae0a3bfb0a/translate'
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
    "http://dev-product.api.hopn.space/promotional_codes/promocode_17d78ae0a3bfb0a/translate?locale=en-US" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "timestamp": 1615938725,
    "signature": "eeea276849336af36d5329351fa441d2",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "cattrad_a2656128dd2f18150",
            "promotional_code_id": "promocode_e0e4cf83ded071a",
            "locale": "en-US",
            "title": "English translation",
            "text": "special black friday discount code",
            "deleted_at": "2021-03-16T23:52:05.000000Z",
            "created_at": "2021-03-16T23:51:19.000000Z",
            "updated_at": "2021-03-16T23:52:05.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-red">DELETE</small>
 **`promotional_codes/{promotional_code_id}/translate`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>promotional_code_id</b></code>&nbsp;      <br>
    Promotional Code ID

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>locale</b></code>&nbsp;      <br>
    Locale




