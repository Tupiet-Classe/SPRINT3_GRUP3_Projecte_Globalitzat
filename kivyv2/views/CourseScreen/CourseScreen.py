from kivymd.app import MDApp
from kivymd.uix.screen import MDScreen
from kivymd.uix.list import OneLineListItem
from kivymd.uix.card import MDCard
from kivy.properties import StringProperty
from kivy.lang import Builder
import json

class MD3Card(MDCard):
    text = StringProperty()
    def __init__(self, *args, **kwargs):
        self.text = kwargs.pop("text", "")
        super().__init__(*args, **kwargs)


class CourseScreen(MDScreen):
    # Carreguem el fitxer
    Builder.load_file('kivyv2/views/CourseScreen/coursescreen.kv')
    
    # Quan entris a aquesta pantalla, ensenya la llista de cursos
    def on_enter(self):
        self.list_courses()
    def novapage(self,row):
        app = MDApp.get_running_app()
        app.switch_screen('CurseDetails')        
    # Mètode que llista tots els cursos que hi ha
    def list_courses(self):
        # Recuperem el JSON amb els cursos i el carreguem
        with open('kivyv2/cursoEVAPymeralia.json', 'r') as json_file:
            json_data = json.load(json_file)
            
        # Per cada curs, imprimeix el seu nom
        for course in json_data:
            self.ids.test.add_widget(MD3Card(text=course['curso'], on_press=self.novapage))
