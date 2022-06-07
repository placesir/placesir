from rest_framework.response import Response
from rest_framework import status
from rest_framework.decorators import api_view
from destination_recomendation_rest_api.models import TblDestination
from destination_recomendation_rest_api import serializers
from destination_recomendation_rest_api.recomendation import recomendationDestination


@api_view(['GET'])
def getDestination(request, id=0):
    if request.method == 'GET':
        if id == 0:
            destination = TblDestination.objects.all()
            ser = serializers.DestinationSerializer(destination, many=True)
            return Response(data={"status" : status.HTTP_200_OK, "message" : "Berhasil Mengambil Data", "data" : ser.data}, status=status.HTTP_200_OK)
        else:
            destination = TblDestination.objects.filter(pk=id)
            ser = serializers.DestinationSerializer(destination, many=True)
            return Response(data={"status" : status.HTTP_200_OK, "message" : "Berhasil Mengambil Data", "data" : ser.data}, status=status.HTTP_200_OK)


@api_view(['GET'])
def getDestinationRecomendation(request):
    if request.method == 'GET':
        recomendation = recomendationDestination()

        data_recomendation = []
        for i in recomendation:
            data = TblDestination.objects.filter(pk=i).first()
            data_recomendation.append(data)

        ser = serializers.DestinationSerializer(data_recomendation, many=True)
        return Response(data={"status" : status.HTTP_200_OK, "message" : "Berhasil Mengambil Data", "data": ser.data}, status=status.HTTP_200_OK)