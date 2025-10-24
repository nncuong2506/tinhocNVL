from flask import Flask, render_template, request, jsonify
from flask_cors import CORS
from chat import get_response

app = Flask(__name__)
CORS(app)

@app.route("/")
def index():
    return render_template("base.php")

@app.route("/predict", methods=["POST"])
def predict():
    data = request.get_json()
    text = data.get("message", "")
    selected_product = data.get("selected_product", "")

    if selected_product:
        response = f"Bạn đã chọn: {selected_product}"
    else:
        response = get_response(text)

    return jsonify({"answer": response})

if __name__ == "__main__":
    app.run(debug=True)
