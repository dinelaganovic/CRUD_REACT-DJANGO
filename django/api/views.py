from rest_framework.response import Response
from rest_framework.decorators import api_view
from rest_framework import status
from base.models import Item
from .serializers import ItemSerializer

@api_view(['GET'])
def get_Data(request):
    person={
        'name':'Dinela',
        'age':24
    }
    items=Item.objects.all()
    serializer=ItemSerializer(items, many=True)
    return Response(serializer.data);

@api_view(['POST'])
def add_Item(request):
    serialaiser=ItemSerializer(data=request.data)
    if serialaiser.is_valid():
        serialaiser.save()
    return Response(serialaiser.data);

@api_view(['GET'])
def get_Item(request, pk):
    try:
        item = Item.objects.get(pk=pk)
    except Item.DoesNotExist:
        return Response(status=status.HTTP_404_NOT_FOUND)

    serializer = ItemSerializer(item)
    return Response(serializer.data);

@api_view(['PUT'])
def update_Item(request, pk):
    try:
        item = Item.objects.get(pk=pk)
    except Item.DoesNotExist:
        return Response(status=status.HTTP_404_NOT_FOUND)

    serializer = ItemSerializer(item, data=request.data)
    if serializer.is_valid():
        serializer.save()
        return Response(serializer.data)
    return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)

@api_view(['DELETE'])
def delete_Item(request, pk):
    try:
        item = Item.objects.get(pk=pk)
    except Item.DoesNotExist:
        return Response(status=status.HTTP_404_NOT_FOUND)

    item.delete()
    return Response(status=status.HTTP_204_NO_CONTENT)