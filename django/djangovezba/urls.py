
from django.contrib import admin

from django.urls import path,include  ##dodati include

urlpatterns = [
    path('admin/', admin.site.urls),
    path('', include('api.urls'))
]
