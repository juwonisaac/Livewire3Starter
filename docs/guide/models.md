# Property Documentation

## Table: `users`

| Property | Type |
| --- | --- |
| `name` | `string` |
| `email` | `string` |
| `phone` | `string` |
| `company_name` | `string` |
| `company_type` | `string` |
| `company_size` | `string` |
| `city` | `string` |
| `country` | `string` |
| `email_verified_at` | `timestamp` |
| `password` | `string` |

## Table: `password_reset_tokens`

| Property | Type |
| --- | --- |
| `email` | `string` |
| `token` | `string` |
| `created_at` | `timestamp` |

## Table: `failed_jobs`

| Property | Type |
| --- | --- |
| `uuid` | `string` |
| `connection` | `text` |
| `queue` | `text` |
| `payload` | `longText` |
| `exception` | `longText` |
| `failed_at` | `timestamp` |

## Table: `personal_access_tokens`

| Property | Type |
| --- | --- |
| `tokenable` | `morphs` |
| `name` | `string` |
| `token` | `string` |
| `abilities` | `text` |
| `last_used_at` | `timestamp` |
| `expires_at` | `timestamp` |

## Table: `pages`

| Property | Type |
| --- | --- |
| `title` | `string` |
| `content` | `json` |
| `cardContent` | `json` |
| `slug` | `string` |
| `type` | `string` |
| `status` | `boolean` |

## Table: `sections`

| Property | Type |
| --- | --- |
| `subtitle` | `string` |
| `title` | `string` |
| `description` | `text` |
| `image` | `string` |
| `bg_color` | `string` |
| `text_color` | `string` |
| `label` | `text` |
| `featured` | `boolean` |
| `link` | `string` |
| `type` | `string` |
| `page_id` | `foreignId` |
| `status` | `string` |

## Table: `categories`

| Property | Type |
| --- | --- |
| `name` | `string` |

## Table: ``

| Property | Type |
| --- | --- |
| `id` | `bigIncrements` |
| `name` | `string` |
| `guard_name` | `string` |
| `model_type` | `string` |

## Table: ``

| Property | Type |
| --- | --- |
| `password` | `after` |
| `form_submission` | `removeColumn` |

## Table: ``

| Property | Type |
| --- | --- |
| `before_registration` | `text` |
| `after_registration` | `text` |

## Table: `contacts`

| Property | Type |
| --- | --- |
| `name` | `string` |
| `email` | `string` |
| `phone_number` | `string` |
| `message` | `mediumText` |

