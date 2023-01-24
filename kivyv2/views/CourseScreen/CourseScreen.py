from kivymd.app import MDApp
from kivymd.uix.screen import MDScreen
from kivymd.uix.list import OneLineListItem, ThreeLineListItem
from kivymd.uix.card import MDCard
from kivy.properties import StringProperty
from kivy.lang import Builder
import json


#Aquesta es la classe de les cartes que contindran el nom dels cursos
class MD3Card(MDCard):
    text = StringProperty()
    def __init__(self, *args, **kwargs):
        self.text = kwargs.pop("text", "")
        super().__init__(*args, **kwargs)


class CourseScreen(MDScreen):
    # Carreguem el fitxer que te instruccions de com mostrar les cartes de les que parlarem mes endevant
    Builder.load_file('kivyv2/views/CourseScreen/coursescreen.kv')
    
    # Quan entrem a aquesta pantalla, executa la funcio que ensenya la llista de cursos
    def on_enter(self):
        self.list_courses()

    def accedir(self, *args):
        print("Accedir als detalls")

        #part important que fa que la nostra app no es freni
        app = MDApp.get_running_app()
        
        #Agafem el métode "openscreen" de la classe CursDetails i li passem la id de el curs que volem obrir
        app.sm.get_screen('CurseDetails').openscreen("HYPOTETICAL_COURSE_ID_TO_SHOW") 
        
    # Mètode que llista tots els cursos que hi ha
    def list_courses(self):
        # Recuperem el JSON amb els cursos i el carreguem
        with open('kivyv2/cursoEVAPymeralia.json', 'r') as json_file:
            json_data = json.load(json_file)
            
        #Per cada curs, imprimeix el seu nom ('curso') dins del MD3Card corresponent que hem creat
        #i afegirem la funcio de accedir-hi dins amb un clic
        for course in json_data:
            self.ids.test.add_widget(MD3Card(text=course['curso'], on_press=self.accedir))
