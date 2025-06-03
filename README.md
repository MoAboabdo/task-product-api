API Documentation
Base URL
http://localhost:8000/api

Endpoints
1. Create Product (with image)
POST /products

Content-Type: multipart/form-data

Fields:

name (required): string

description (required): string

price (required): decimal

quantity (required): integer

image (optional): image file (jpeg,png,jpg,gif, max 2MB)

Example Request:

bash
curl -X POST http://localhost:8000/api/products \
  -H "Accept: application/json" \
  -F "name=Premium Coffee" \
  -F "description=Arabica coffee beans" \
  -F "price=12.99" \
  -F "quantity=50" \
  -F "image=@coffee.jpg"
2. List Products
GET /products

Query Parameters:

page (optional): integer (default: 1)

Example Response:

json
{
  "data": [
    {
      "id": 1,
      "name": "Premium Coffee",
      "description": "Arabica coffee beans",
      "price": 12.99,
      "quantity": 50,
      "image_url": "http://localhost:8000/storage/products/coffee.jpg"
    }
  ],
  "links": {...},
  "meta": {...}
}
3. Get Single Product
GET /products/{id}

4. Update Product
PUT /products/{id}
(Can use either multipart/form-data or application/json)

5. Delete Product
DELETE /products/{id}
