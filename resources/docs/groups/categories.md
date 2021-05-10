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
    "timestamp": 1617277340,
    "signature": "ade3a88db94c8727302436bdbb873db6",
    "content": {
        "success": true,
        "async": false,
        "body": {
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
    }
}
```
> Example response (200, Relations filter):

```json
{
    "timestamp": 1617277354,
    "signature": "f3d157f3aa0cc655f121280c3d82d49b",
    "content": {
        "success": true,
        "async": false,
        "body": {
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
            "text": "Boisson",
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
                },
                {
                    "id": "prod_1344f9b420f516b26861",
                    "deleted_at": null,
                    "created_at": "2021-03-29T09:31:00.000000Z",
                    "updated_at": "2021-03-29T09:31:00.000000Z",
                    "current_pricing": {
                        "id": null,
                        "price_including_taxes": 55,
                        "price_excluding_taxes": 50,
                        "vat_value": 5,
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
                        "id": "prodprice_8d903e2d741bf4c",
                        "price_including_taxes": 110,
                        "price_excluding_taxes": 100,
                        "vat_value": 10,
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
                },
                {
                    "id": "prod_19ad05fce8103175db0e",
                    "deleted_at": null,
                    "created_at": "2021-03-31T14:28:10.000000Z",
                    "updated_at": "2021-03-31T14:59:52.000000Z",
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
            ],
            "composite_products": [],
            "discounts": [
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
    "timestamp": 1617277258,
    "signature": "51220aa87bfeee74cdde16e03b0a4075",
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
                "text": "Abonnement"
            },
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
            },
            {
                "id": "cat_d10be1a57a0fddafc85b5",
                "deleted_at": null,
                "created_at": "2021-03-29T09:30:59.000000Z",
                "updated_at": "2021-03-29T09:30:59.000000Z",
                "discount": null,
                "title": "Traduction en français",
                "text": "nourriture"
            },
            {
                "id": "cat_3a61a9ed91efe584ca27c",
                "deleted_at": null,
                "created_at": "2021-03-29T09:30:59.000000Z",
                "updated_at": "2021-03-29T09:30:59.000000Z",
                "discount": null,
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
    "timestamp": 1617277276,
    "signature": "42023823b1a6804b060db699a8812721",
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
                "text": "Abonnement",
                "products": [],
                "composite_products": [],
                "discounts": [
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
            },
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
                "text": "Boisson",
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
                    },
                    {
                        "id": "prod_1344f9b420f516b26861",
                        "deleted_at": null,
                        "created_at": "2021-03-29T09:31:00.000000Z",
                        "updated_at": "2021-03-29T09:31:00.000000Z",
                        "current_pricing": {
                            "id": null,
                            "price_including_taxes": 55,
                            "price_excluding_taxes": 50,
                            "vat_value": 5,
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
                            "id": "prodprice_8d903e2d741bf4c",
                            "price_including_taxes": 110,
                            "price_excluding_taxes": 100,
                            "vat_value": 10,
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
                    },
                    {
                        "id": "prod_19ad05fce8103175db0e",
                        "deleted_at": null,
                        "created_at": "2021-03-31T14:28:10.000000Z",
                        "updated_at": "2021-03-31T14:59:52.000000Z",
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
                ],
                "composite_products": [],
                "discounts": [
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
            },
            {
                "id": "cat_d10be1a57a0fddafc85b5",
                "deleted_at": null,
                "created_at": "2021-03-29T09:30:59.000000Z",
                "updated_at": "2021-03-29T09:30:59.000000Z",
                "discount": null,
                "title": "Traduction en français",
                "text": "nourriture",
                "products": [
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
                    }
                ],
                "composite_products": [],
                "discounts": []
            },
            {
                "id": "cat_3a61a9ed91efe584ca27c",
                "deleted_at": null,
                "created_at": "2021-03-29T09:30:59.000000Z",
                "updated_at": "2021-03-29T09:30:59.000000Z",
                "discount": null,
                "title": "Traduction en français",
                "text": "repas",
                "products": [],
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
                    },
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
    "timestamp": 1617277384,
    "signature": "38f9e1d7c90ae9495206c920eb2eecad",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "cat_7212aa03fc13a5d1163bd",
            "updated_at": "2021-04-01T11:43:04.000000Z",
            "created_at": "2021-04-01T11:43:04.000000Z",
            "discount": null,
            "title": "Traduction française",
            "text": "coworking"
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
    "timestamp": 1617277460,
    "signature": "95f64d391d0ce842049e5db2fff8ae43",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "cat_7212aa03fc13a5d1163bd",
            "deleted_at": "2021-04-01T11:44:19.000000Z",
            "created_at": "2021-04-01T11:43:04.000000Z",
            "updated_at": "2021-04-01T11:44:19.000000Z",
            "discount": null,
            "title": null,
            "text": null
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
    "timestamp": 1617277413,
    "signature": "fcfea7eeb8418a56e0bc26f553f1d96f",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "cattrad_f9020ff471fe2001d",
            "category_id": "cat_7212aa03fc13a5d1163bd",
            "locale": "en-US",
            "title": "English translation",
            "text": "coworking",
            "deleted_at": null,
            "created_at": "2021-04-01T11:43:33.000000Z",
            "updated_at": "2021-04-01T11:43:33.000000Z"
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
    "timestamp": 1617277440,
    "signature": "4dede59c5b6ac574700986efa7ae4c3a",
    "content": {
        "success": true,
        "async": false,
        "body": {
            "id": "cattrad_f9020ff471fe2001d",
            "category_id": "cat_7212aa03fc13a5d1163bd",
            "locale": "en-US",
            "title": "English translation",
            "text": "coworking",
            "deleted_at": "2021-04-01T11:44:00.000000Z",
            "created_at": "2021-04-01T11:43:33.000000Z",
            "updated_at": "2021-04-01T11:44:00.000000Z"
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




