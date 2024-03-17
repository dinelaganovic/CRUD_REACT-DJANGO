from django.urls import path
from . import views

urlpatterns=[
    path('',views.get_Data),
    path('add/', views.add_Item),
    path('getById/<int:pk>/', views.get_Item, name='get_item'),
    path('updateById/<int:pk>/update/', views.update_Item, name='update_item'),
    path('deteleById/<int:pk>/delete/', views.delete_Item, name='delete_item'),
]