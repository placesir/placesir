from rest_framework import serializers
from .models import *


class DestinationSerializer(serializers.ModelSerializer):
    class Meta:
        model = TblDestination
        fields = ('id', 'place_name', 'description', 'category', 'city', 'price', 'rating', 'time', 'coordinate', 'lat', 'long', 'image_url')