import os
from scipy import spatial
import numpy as np
import gensim
import nltk
from keras.models import load_model
import gensim.models.keyedvectors as word2vec
from nltk.tokenize import word_tokenize,sent_tokenize
import pandas as pd
import numpy as np
import nltk as nl
import io
import random
import warnings
import matplotlib.pyplot as plt
import seaborn as sns
import csv

import theano
def chat(x):

    model=load_model('LSTM5000.h5')
    mod=word2vec.KeyedVectors.load_word2vec_format('word2vec.bin',binary=True)
    #x=input("Enter the message:")
    sentend=np.ones((300,),dtype=np.float32)
    sent=nltk.word_tokenize(x.lower())
    sentvec = [mod[w] for w in sent if w in mod.vocab]
    sentvec[30:]=[]
    sentvec.append(sentend)
    if len(sentvec)<31:
        for i in range(31-len(sentvec)):
            sentvec.append(sentend)
    sentvec=np.array([sentvec])
    predictions = model.predict(sentvec)
    outputlist=[mod.most_similar([predictions[0][i]])[0][0] for i in range(31)]
    output=' '.join(outputlist)
    print(output)
    return output
