import numpy as np
from keras.models import load_model
import random



def recomendationDestination():
    model = load_model("destination_recomendation_rest_api/model_recomendation_rating.h5")

    id_place = range(1,515)
    id_user = random.randint(1, 300)
    tourism_data = np.array(list(set(id_place)))
    tourism_data[:10]
    user = np.array([id_user for i in range(len(tourism_data))])

    predictions = model.predict([user, tourism_data])
    predictions = np.array([a[0] for a in predictions])
    recommended_tourism_ids = (-predictions).argsort()[:10]

    return recommended_tourism_ids