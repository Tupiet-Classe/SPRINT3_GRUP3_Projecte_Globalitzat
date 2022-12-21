from kivymd.app import MDApp
from kivymd.uix.screen import MDScreen
from kivymd.uix.list import OneLineListItem
from kivy.lang import Builder
import json

class CourseScreen(MDScreen):
    # Carreguem el fitxer
    Builder.load_file('kivyv2/views/CourseScreen/coursescreen.kv')
    
    # Quan entris a aquesta pantalla, ensenya la llista de cursos
    def on_enter(self):
        self.list_courses()
                        
    # Mètode que llista tots els cursos que hi ha
    def list_courses(self):
        # Recuperem el JSON amb els cursos i el carreguem
        with open('kivyv2/cursoEVAPymeralia.json', 'r') as json_file:
            json_data = json.load(json_file)
            
        # Per cada curs, imprimeix el seu nom
        for course in json_data:
            self.ids.test.add_widget(OneLineListItem(text=course['curso']))
