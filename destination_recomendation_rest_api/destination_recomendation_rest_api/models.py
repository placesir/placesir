from django.db import models

class TblDestination(models.Model):
    place_name = models.CharField(max_length=50, blank=True, null=True)
    description = models.TextField(blank=True, null=True)
    category = models.CharField(max_length=100, blank=True, null=True)
    city = models.CharField(max_length=50, blank=True, null=True)
    price = models.IntegerField(blank=True, null=True)
    rating = models.CharField(max_length=3, blank=True, null=True)
    time = models.IntegerField(blank=True, null=True)
    coordinate = models.TextField(blank=True, null=True)
    lat = models.CharField(max_length=50, blank=True, null=True)
    long = models.CharField(max_length=50, blank=True, null=True)
    image_url = models.CharField(max_length=255, blank=True, null=True)

    class Meta:
        db_table = 'tbl_destination'