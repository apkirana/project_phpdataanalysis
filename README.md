# E-commerce Dashboard (PHP + Chart.js)

A small server-rendered analytics dashboard: PHP reads a JSON dataset, reshapes it, and hands it to
Chart.js to draw three views of an e-commerce business — monthly sales, sales by product, and customers
by country.

Written as a teaching example of the **server-side rendering** pattern: PHP does the data preparation
with `array_column()` before the page is sent, so the browser receives values that are already
chart-ready rather than fetching and transforming them itself.

## What it draws

| Chart | Type | Source field |
| --- | --- | --- |
| Monthly Sales | Line | `sales[].date` / `sales[].amount` |
| Product Sales | Bar | `products[].name` / `products[].sales` |
| Customer Locations | Bar | `customerLocations[].country` / `customerLocations[].customers` |

## Running it

Requires PHP 7.4 or newer. No database and no Composer dependencies.

```bash
git clone https://github.com/apkirana/project_phpdataanalysis.git
cd project_phpdataanalysis
php -S localhost:8000
```

Then open <http://localhost:8000>.

## Using your own data

Everything is driven by `data.json`. Keep the three top-level keys and the dashboard picks up your
numbers without any change to `index.php`:

```json
{
  "sales":             [{"date": "2023-01", "amount": 12500}],
  "products":          [{"name": "Laptop", "sales": 150}],
  "customerLocations": [{"country": "USA", "customers": 500}]
}
```

The bundled `data.json` is **synthetic sample data**, not a real business record — it exists so the
charts have something to render.

## Repository structure

```text
index.php    - reads data.json, prepares arrays, renders the page and chart config
data.json    - the sample dataset
chart.js     - vendored Chart.js library
styles.css   - dashboard layout
```

## Licence

MIT — see [LICENSE](LICENSE).

---

## Author

**Annisa Puspa Kirana** — PhD researcher, Faculty of Geo-Information Science and Earth Observation (ITC),
University of Twente. Research on agentic AI and LLM-driven workflows for Earth observation.

[Google Scholar](https://scholar.google.com/citations?user=BQl6KOsAAAAJ&hl=en) ·
[ORCID](https://orcid.org/0000-0002-4622-1445) ·
[LinkedIn](https://www.linkedin.com/in/annisapuspakirana) ·
[GitHub](https://github.com/apkirana)
