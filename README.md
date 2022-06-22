# SimpleRESTAPI

Simple REST Server using native PHP

for learning purpose

**updated soon**

### Documentation

---

| Field | Description                                                                                            |
| ----- | ------------------------------------------------------------------------------------------------------ |
| key   | is a unique key used to access the next endpoint example `key : 'smoke-on-the-water'` soon implemented |
| index | unique identifier to see detailed data                                                                 |

### endpoint usage

---

**Base URL** : `https://testkodeapi.000webhostapp.com`

| Endpoint           | Usage           | Example    | Method |
| ------------------ | --------------- | ---------- | ------ |
| View random data   | `/music`        | -          | GET    |
| View Detailed Data | `/music/:index` | `/music/1` | GET    |
| Insert Data        | `/music`        | -          | POST   |
| Update Data        | `/music/:index` | `/music/1` | PUT    |
| Delete Data        | `/music/:index` | `/music/1` | DELETE |

#### Credits

Copyright © 2022 Hendri Priyambowo

Build With 💙
