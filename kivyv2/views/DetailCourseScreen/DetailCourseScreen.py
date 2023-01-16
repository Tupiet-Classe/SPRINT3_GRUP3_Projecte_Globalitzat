#Importar els paquets necessàris
from kivymd.app import MDApp
from kivymd.uix.screen import MDScreen
from kivymd.uix.screen import Screen
from kivy.properties import StringProperty
from kivy.uix.boxlayout import BoxLayout
from kivy.lang import Builder
from kivy.app import App
from kivymd.uix.list import MDList, ThreeLineListItem
import json

#Crearem una classe que farà la funció d'una llista
class DetailCourseScreen(MDScreen):
    def on_enter(self, *args):
        self.list_description()
   
    
    Builder.load_file('kivyv2/views/DetailCourseScreen/detailscoursescreen.kv')

    def list_description(self):
        #Obrir l'arxiu JSON i aquests els carregarem en una variable
        with open("kivyv2/views/DetailCourseScreen/cursoDetallesCurso.json") as json_file:
            ## Utilitzem les dades JSON i afegim elements a la vista de llista
            list_items = json.load(json_file)
                
            list_view = MDList()
            for item in list_items:
                self.ids["detalls2"].add_widget(ThreeLineListItem(text=item["name"], secondary_text=item["type"], tertiary_text=item["description"]))
            return list_view
        
    def open(self,row):
        app = MDApp.get_running_app()
        app.switch_screen('CurseDetails')       