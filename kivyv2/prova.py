from kivy.app import App
from kivy.uix.boxlayout import BoxLayout
from kivy.uix.recycleview import RecycleView
from kivy.uix.recycleview.views import RecycleDataViewBehavior
from kivy.uix.label import Label
from kivy.properties import BooleanProperty, StringProperty
import json

class ThreeLineListItem(RecycleDataViewBehavior, BoxLayout):
    text = StringProperty()
    secondary_text = StringProperty()
    tertiary_text = StringProperty()
    
    index = None
    
    def refresh_view_attrs(self, rv, index, data):
        self.index = index
        return super(ThreeLineListItem, self).refresh_view_attrs(rv, index, data)

class RecycleViewJSON(RecycleView):
    def __init__(self, **kwargs):
        super(RecycleViewJSON, self).__init__(**kwargs)

        with open("cursoDetallesCurso.json") as json_file:
            self.data = json.load(json_file)

        self.data = [{'text': str(x['text']), 'secondary_text': str(x['secondary_text']), 'tertiary_text': str(x['tertiary_text'])} for x in self.data]
        self.adapter = MyAdapter(data=self.data, cls=ThreeLineListItem)
        self.adapter.bind(on_selection_change=lambda x: setattr(self, 'selected_data', x.selection))
        
class MyAdapter(Adapter):
    def get_data(self, index):
        return self.data[index]
    
    def get_view(self, index):
        return self.view_cls(**self.data[index])
    
    def get_data_item(self, index):
        return self.data[index]
    
    def get_data_length(self):
        return len(self.data)

class MyApp(App):
    def build(self):
        return RecycleViewJSON()

if __name__ == '__main__':
    MyApp().run()
