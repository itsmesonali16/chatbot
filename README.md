#Chatbot for café 
## 📌 Overview
This chatbot system is designed to understand and process human language efficiently using advanced AI techniques. The project integrates three key algorithms: **Natural Language Processing (NLP)** for text preprocessing, **Long Short-Term Memory (LSTM)** for training the chatbot model, and **Apriori Algorithm** for recommending relevant responses based on frequent patterns.

## ✨ Features
✅ **Preprocessing of text using NLP** (Tokenization, Stopword Removal, Special Character Removal)
✅ **Deep Learning-based chatbot training** using LSTM Neural Networks  
✅ **Food recommendation system** using the Apriori algorithm  
✅ **Efficient response generation** based on conversational context  

## 🛠️ Technologies Used
- 🐍 **Python**
- 🧠 **Natural Language Processing (NLP)**
- 🔄 **Long Short-Term Memory (LSTM) Neural Network**
- 📊 **Apriori Algorithm**
- 🔤 **Word2Vec**
- 📑 **Pandas & NumPy**
- 💾 **Pickle (for model storage)**

---
## 📚 Algorithms Used
### 1️⃣ Natural Language Processing (NLP)
NLP enables the chatbot to analyze, understand, and extract meaningful information from human language. The key steps in NLP preprocessing include:
- ✂ **Tokenization:** Splitting sentences into words.
- 🚫 **Stopword Removal:** Eliminating common words like 'the', 'is', 'and'.
- ✨ **Special Character Removal:** Cleaning unnecessary characters for efficient processing.

### 2️⃣ Long Short-Term Memory (LSTM)
LSTM, a type of Recurrent Neural Network (RNN), is used to train the chatbot model. It is capable of learning from sequential data, making it suitable for chatbot conversations. 

**📌 Preprocessing:**  
🔹 Load a pre-trained Word2Vec model.  
🔹 Convert conversational sentences into vectorized formats (**x_vec, y_vec**) using `KeyedVector`.  
🔹 Store preprocessed data in a **pickle file** for training.  

**📌 Training:**  
🔹 Extract data from the pickle file.  
🔹 Train the model using LSTM with **sigmoid activation function**.  
🔹 **500 epochs** are used to improve chatbot accuracy.  

### 3️⃣ Apriori Algorithm
The Apriori algorithm is used for association rule learning and frequent item set mining. In this chatbot, it is applied for recommending food items based on past user interactions.

- 🔎 Identifies frequently purchased items in the database.
- 📊 Generates the **top 10 most purchased items**.
- 🎲 Recommends a random item from the top 10 to the user.

---
## 🚀 Installation & Setup
1️⃣ Clone the repository:
   ```sh
   git clone https://github.com/yourusername/chatbot-project.git
   cd chatbot-project
   ```
2️⃣ Install dependencies:
   ```sh
   pip install -r requirements.txt
   ```
3️⃣ Run the chatbot:
   ```sh
   python chatbot.py
   ```

---
## 🏆 Usage
- 🗨 Users can interact with the chatbot by sending text queries.
- 🔄 The chatbot processes input using NLP and responds based on trained LSTM models.
- 🍽 Food recommendations are made using the Apriori algorithm.


